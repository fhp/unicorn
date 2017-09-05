<?php

namespace Unicorn\Forms;

abstract class Form extends InputList
{
	private $form;
	private $submitText;
	
	private $magicFieldName = "_activeForm";
	private $magicField;
	
	private $redirectPage = null;
	
	abstract public function checkAccess(): bool;
	abstract public function title(): string;
	abstract protected function buildForm(): void;
	abstract public function handle(): void;
	
	function __construct($id, $name = null, $submitText = "Submit", $action = "", $method = "post")
	{
		if($name === null) {
			$name = $id;
		}
		
		parent::__construct($this, $name);
		
		$this->form = new \Unicorn\UI\HTML\Form();
		$this->form->setName($name);
		$this->form->setID($id);
		$this->form->setAction($action);
		$this->form->setMethod($method);
		$this->form->setEnctype("multipart/form-data");
		$this->form->setAcceptCharset("UTF-8");
		
		$this->magicField = new HiddenInput($this, $this->magicFieldName, $this->id());
		$this->addInput($this->magicField);
		
		$this->submitText = $submitText;
		
		$this->buildForm();
		
		$this->process();
	}
	
	public function form(): Form
	{
		return $this;
	}
	
	public function prefix(): string
	{
		return $this->id() . "-";
	}
	
	public function id()
	{
		return $this->form->id();
	}
	
	public function isActive(): bool
	{
		return $this->magicField->value() == $this->id();
	}
	
	public function widget()
	{
		return $this->form;
	}
	
	public function submitText(): string
	{
		return $this->submitText;
	}
	
	protected function redirect(): void
	{
		if($this->redirectPage === false) {
			return;
		}
		if($this->redirectPage === null) {
			$target = $_SERVER["REQUEST_URI"];
		} else {
			$target = $this->redirectPage;
		}
		$this->doRedirect($target);
	}
	
	protected function doRedirect($target)
	{
		header("location: $target");
		die();
	}
	
	private function process()
	{
		if(!$this->checkAccess()) {
			return;
		}
		if(!$this->isActive()) {
			return;
		}
		
		$this->check();
		
		if(!$this->isSane()) {
			return;
		}
		
		$this->handle();
		
		if($this->isSane()) {
			$this->redirect();
		}
	}
	
	protected function isPost(): bool
	{
		return strtolower($this->form->method()) == "post";
	}
	
	protected function isGet(): bool
	{
		return strtolower($this->form->method()) == "get";
	}
	
	public function data(string $name)
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
