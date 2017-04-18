<?php

namespace Unicorn\Forms;

use Unicorn\Forms\Conditions\InputNotEmpty;
use Unicorn\UI\Base\Container;
use Unicorn\UI\Base\ElementWidget;
use Unicorn\UI\Base\HtmlElement;
use Unicorn\UI\Base\Stub;
use Unicorn\UI\Base\Widget;
use Unicorn\UI\Exceptions\UnsetPropertyException;

abstract class AbstractInput extends ElementWidget implements FormInput
{
	/** @var string */
	private $label;
	
	/** @var Widget */
	private $input;
	
	/** @var Container */
	private $errors;
	
	/** @var Form */
	private $form = null;
	
	/** @var string */
	private $name;
	
	private $convertedValue = null;
	
	function __construct(Form $form, Widget $input, string $id, string $label = null, string $name = null)
	{
		$this->form = $form;
		$this->input = $input;
		$this->label = $label;
		
		$this->errors = new Container();
		
		if($name === null) {
			$name = $id;
		}
		$this->name = $name;
		
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
		
		if($this->form->isActive()) {
			$value = $this->value();
			if($value !== null) {
				$this->setValue($value);
			}
		}
		
		parent::__construct($div);
	}
	
	abstract public function setValue(string $value): void;
	abstract public function hasValue(): bool;
	
	/**
	 * @return Container|HtmlElement|Widget
	 */
	protected function input(): Widget
	{
		return $this->input;
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
	
	protected function form(): Form
	{
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
	
	public function required($message = "This field is required.")
	{
		$this->form()->ensure(new InputNotEmpty($this, $message));
	}
	
	public function requiredIf(FormInput $otherInput, $otherValue, $message = "This field is required.")
	{
		$this->form()->ensure(new InputNotEmptyIfOtherFieldMatchesCondition($this, $otherInput, function($value) use($otherValue) { return $value == $otherValue; }, $message));
	}
	
	// TODO: meer standaard checks!
	
	// TODO: andere properties toevoegen: http://www.w3schools.com/tags/tag_input.asp
}

