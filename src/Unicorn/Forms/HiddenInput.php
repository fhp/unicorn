<?php

namespace Unicorn\Forms;

use Unicorn\UI\Base\ElementWidget;
use Unicorn\UI\Base\HtmlElement;
use Unicorn\UI\Exceptions\InvalidFunctionCallException;

class HiddenInput extends ElementWidget implements FormInput
{
	/** @var Form */
	private $form;
	
	private $convertedValue = null;
	
	function __construct($id, $value, $name = null)
	{
		if($name === null) {
			$name = $id;
		}
		
		$input = new HtmlElement("input");
		$input->setProperty("type", "hidden");
		$input->setID($id);
		$input->setProperty("name", $name);
		$input->setProperty("value", $value);
		
		parent::__construct($input);
	}
	
	public function name(): string
	{
		return $this->element()->property("name");
	}
	
	public function setForm(Form $form): void
	{
		$this->form = $form;
	}
	
	protected function form(): Form
	{
		if($this->form === null) {
			throw new InvalidFunctionCallException("FormInput::setForm() is not called.");
		}
		return $this->form;
	}
	
	
	public function value()
	{
		if($this->convertedValue !== null) {
			return $this->convertedValue;
		}
		return $this->form()->data($this->name());
	}
	
	public function updateValue($value): void
	{
		$this->convertedValue = $value;
	}
	
	public function error(string $message = null): void
	{
		$this->form()->setError();
	}
}
