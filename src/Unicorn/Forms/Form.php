<?php

namespace Unicorn\Forms;

use Unicorn\Forms\Conditions\FormCondition;
use Unicorn\UI\Base\ElementWidget;
use Unicorn\UI\Base\HtmlElement;

abstract class Form extends ElementWidget
{
	protected $magicFieldName = "_activeForm";
	private $magicField;
	
	private $redirectPage = null;
	
	/** @var bool */
	private $errors = false;
	
	/** @var FormCondition[] */
	private $conditions;
	
	abstract public function checkAccess(): bool;
	abstract public function form(): void;
	abstract public function handle(): void;
	
	public function __construct($id, $action, $method = "post", $encoding = "multipart/form-data", $charset = "UTF-8")
	{
		parent::__construct(null);
		
		$this->ensureElementSet();
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
		
		$this->form();
		
		$this->process();
	}
	
	private function ensureElementSet()
	{
		if($this->hasElement()) {
			return;
		}
		$this->setElement(new HtmlElement("form"));
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
	
	protected function addInput(FormInput $input): void
	{
		$this->ensureElementSet();
		
		$input->setForm($this);
		
		$this->element()->addChild($input);
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