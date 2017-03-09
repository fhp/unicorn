<?php

namespace Unicorn\Forms;

use Unicorn\UI\Base\Container;
use Unicorn\UI\Base\ElementWidget;
use Unicorn\UI\Base\HtmlElement;
use Unicorn\UI\Base\Stub;
use Unicorn\UI\Base\Widget;
use Unicorn\UI\Exceptions\InvalidFunctionCallException;
use Unicorn\UI\Exceptions\UnsetPropertyException;

abstract class AbstractInput extends ElementWidget implements FormInput
{
	/** @var string */
	private $label;
	
	/** @var Stub */
	private $input;
	
	/** @var Container */
	private $errors;
	
	/** @var Form */
	private $form;
	
	/** @var string */
	private $name;
	
	private $convertedValue = null;
	
	function __construct(string $id, string $label = null, string $name = null)
	{
		$this->label = $label;
		$this->errors = new Container();
		
		if($name === null) {
			$name = $id;
		}
		$this->name = $name;
		$this->input = new Stub();
		
		$div = new HtmlElement("div");
		$div->addClass("form-group");
		
		$inputDiv = new HtmlElement("div");
		$inputDiv->addClass("col-sm-10");
		$inputDiv->addChild($this->input);
		$inputDiv->addChild($this->errors);
		
		if($label !== null) {
			$labelElement = new HtmlElement("label");
			$labelElement->setProperty("for", $id);
			$labelElement->addClass("col-sm-2");
			$labelElement->addClass("control-label");
			$labelElement->addText($label);
			$div->addChild($labelElement);
		} else {
			$inputDiv->addClass("col-sm-offset-2");
		}
		
		$div->addChild($inputDiv);
		
		parent::__construct($div);
	}
	
	abstract public function setValue(string $value): void;
	abstract public function hasValue(): bool;
	
	/**
	 * @return Container|HtmlElement|Widget
	 * @throws \Unicorn\UI\Exceptions\NoElementSetException
	 */
	protected function input(): Widget
	{
		return $this->input->widget();
	}
	
	protected function hasInput(): bool
	{
		return $this->input->hasWidget();
	}
	
	protected function setInput(Widget $widget)
	{
		$this->input->setWidget($widget);
	}
	
	public function name(): string
	{
		return $this->name;
	}
	
	public function label(): string
	{
		if(!$this->hasLabel()) {
			throw new UnsetPropertyException("label");
		}
		return $this->label;
	}
	
	public function hasLabel(): bool
	{
		return $this->label !== null;
	}
	
	public function setForm(Form $form): void
	{
		$this->form = $form;
		if($form->isActive()) {
			$value = $this->value();
			if($value !== null) {
				$this->setValue($value);
			}
		}
	}
	
	protected function form(): Form
	{
		if($this->form === null) {
			throw new InvalidFunctionCallException("FormInput::setForm() is not called.");
		}
		return $this->form;
	}
	
	public function setDefaultValue(string $value)
	{
		if(!$this->hasValue()) {
			$this->setValue($value);
		}
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
		
		$this->element()->addClass("has-error");
		if($message !== null) {
			$helpBlock = new HtmlElement("span");
			$helpBlock->addClass("help-block");
			$helpBlock->addText($message);
			$this->errors->addChild($helpBlock);
		}
	}
	
	public function check(bool $condition, string $message = null): bool
	{
		if(!$condition) {
			$this->error($message);
		}
		return $condition;
	}
	
	// TODO: andere properties toevoegen: http://www.w3schools.com/tags/tag_input.asp
}

