<?php

namespace Unicorn\Forms;

use Unicorn\Forms\Conditions\InputNotEmpty;
use Unicorn\Forms\Conditions\InputNotEmptyIfOtherFieldMatchesCondition;
use Unicorn\UI\Base\Container;
use Unicorn\UI\Base\ElementWidget;
use Unicorn\UI\Base\HtmlElement;
use Unicorn\UI\Base\Stub;
use Unicorn\UI\Base\Widget;
use Unicorn\UI\Exceptions\UnsetPropertyException;
use Unicorn\UI\HTML\Div;

abstract class AbstractInput extends ElementWidget implements FormInput
{
	/** @var string */
	private $label;
	
	/** @var HtmlElement */
	private $input;
	
	/** @var Container */
	private $errors;
	
	/** @var Form */
	private $form = null;
	
	/** @var string */
	private $name;
	
	private $convertedValue = null;
	
	function __construct(Form $form, HtmlElement $input, string $label = null, string $name = null)
	{
		$this->form = $form;
		$this->input = $input;
		$this->label = $label;
		
		$this->errors = new Container();
		
		if($name === null) {
			$name = $input->id();
		}
		$this->name = $name;
		
		if($this->form->isActive()) {
			$value = $this->value();
			if($value !== null) {
				$this->setValue($value);
			}
		}
		
		$renderedInput = $this->form->renderInput($this->input, $this->errors, $this->label);
		
		parent::__construct($renderedInput);
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
		
		$this->input->addClass("is-invalid");
		if($message !== null) {
			$helpBlock = new Div("invalid-feedback");
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

