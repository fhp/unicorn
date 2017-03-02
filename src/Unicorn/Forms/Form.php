<?php

namespace Unicorn\Forms;

use Unicorn\Forms\Conditions\FormCondition;
use Unicorn\UI\Base\ContainerWrapper;
use Unicorn\UI\Base\Element;
use Unicorn\UI\Base\ElementWidget;
use Unicorn\UI\Base\HtmlElement;
use Unicorn\UI\Base\Stub;
use Unicorn\UI\Base\Widget;
use Unicorn\UI\Exceptions\NoElementSetException;

abstract class Form extends ElementWidget
{
	use ContainerWrapper;
	
	protected $magicFieldName = "_activeForm";
	private $magicField;
	
	private $redirectPage = null;
	
	/** @var bool */
	private $errors = false;
	
	/** @var FormCondition[] */
	private $conditions = array();
	
	/** @var SubmitButton */
	private $submitButton;
	
	/** @var Stub */
	private $submitButtonWrapper;
	
	/** @var Stub */
	private $titleWrapper;
	
	abstract public function checkAccess(): bool;
	abstract public function title(): string;
	abstract public function form(): void;
	abstract public function handle(): void;
	
	public function __construct($id, $action, $method = "post", $encoding = "multipart/form-data", $charset = "UTF-8")
	{
		parent::__construct(null);
		
		$form = $this->element();
		$form->setID($id);
		$form->setProperty("action", $action);
		$form->setProperty("method", $method);
		if($this->isPost()) {
			$form->setProperty("enctype", $encoding);
		}
		$form->setProperty("accept-charset", $charset);
		$form->addClass("form-horizontal");
		
		$this->magicField = new HiddenInput($this->magicFieldName, $this->id());
		$this->addInput($this->magicField);
		
		$this->setTitle();
		$this->form();
		
		$this->process();
	}
	
	/**
	 * @return Element|HtmlElement
	 * @throws NoElementSetException
	 */
	protected function element(): Element
	{
		if(!$this->hasElement()) {
			$this->setElement(new HtmlElement("form"));
			$this->setContainer($this->element());
		}
		return parent::element();
	}
	
	private function process()
	{
		if(!$this->checkAccess()) {
			return;
		}
		if(!$this->isActive()) {
			return;
		}
		
		$this->basicChecks();
		
		if(!$this->isSane()) {
			return;
		}
		
		$this->handle();
		
		if($this->isSane()) {
			$this->redirect();
		}
	}
	
	protected function ensure(FormCondition $condition)
	{
		$this->conditions[] = $condition;
	}
	
	private function basicChecks(): void
	{
		foreach($this->conditions as $condition) {
			$condition->check();
		}
	}
	
	public function setError()
	{
		$this->errors = true;
	}
	
	public function isSane(): bool
	{
		return $this->errors === false;
	}
	
	protected function redirect()
	{
		if($this->redirectPage === false) {
			return;
		}
		if($this->redirectPage === null) {
			$target = $_SERVER["REQUEST_URI"];
		} else {
			$target = $this->redirectPage;
		}
		header("location: $target");
		die();
	}
	
	public function disableRedirect(): void
	{
		$this->redirectPage = false;
	}
	
	public function setRedirectTarget(string $target): void
	{
		$this->redirectPage = $target;
	}
	
	public function render(): string
	{
		if(!$this->checkAccess()) {
			return "";
		}
		return parent::render();
	}
	
	protected function method(): string
	{
		return strtolower($this->element()->property("method"));
	}
	
	protected function isPost(): bool
	{
		return $this->method() == "post";
	}
	
	protected function isGet(): bool
	{
		return $this->method() == "get";
	}
	
	protected function setTitle(Widget $titleWidget = null): void
	{
		if($titleWidget === null) {
			$titleWidget = new HtmlElement("legend");
			$titleWidget->addText($this->title());
		}
		
		if($this->titleWrapper === null) {
			$this->titleWrapper = new Stub();
			$this->element()->addChild($this->titleWrapper);
		}
		$this->titleWrapper->setWidget($titleWidget);
	}
	
	public function noTitle(): void
	{
		$this->titleWrapper->unsetWidget();
	}
	
	public function hasTitle(): bool
	{
		return $this->titleWrapper->hasWidget();
	}
	
	protected function addInput(FormInput $input): void
	{
		$input->setForm($this);
		$this->element()->addChild($input);
	}
	
	protected function setSubmitButton(SubmitButton $button): void
	{
		$button->setForm($this);
		
		$this->submitButton = $button;
		if($this->submitButtonWrapper === null) {
			$this->submitButtonWrapper = new Stub();
		}
		$this->submitButtonWrapper->setWidget($this->submitButton);
		$this->element()->addChild($this->submitButtonWrapper);
	}
	
	public function noSubmitButton(): void
	{
		if($this->submitButtonWrapper !== null) {
			$this->submitButtonWrapper->unsetWidget();
		}
	}
	
	public function hasSubmitButton(): bool
	{
		return $this->submitButton !== null;
	}
	
	public function submitButton(): SubmitButton
	{
		if(!$this->hasSubmitButton()) {
			throw new NoElementSetException("No submitbutton set");
		}
		return $this->submitButton;
	}
	
	public function isActive(): bool
	{
		return $this->magicField->value() == $this->id();
	}
	
	public function data($name)
	{
		if($this->isPost()) {
			if(isset($_POST[$name])) {
				return $_POST[$name];
			}
		} else {
			if(isset($_GET[$name])) {
				return $_GET[$name];
			}
		}
		return null;
	}
}
