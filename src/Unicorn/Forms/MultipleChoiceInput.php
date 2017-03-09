<?php

namespace Unicorn\Forms;

use Unicorn\UI\Exceptions\UnsetPropertyException;

abstract class MultipleChoiceInput extends AbstractInput
{
	private $options = array();
	private $default = null;
	
	abstract protected function createInput(string $name, string $value, string $label): MultipleChoiceInputElement;
	
	public function addOption(string $value, string $label, bool $default = false)
	{
		$option = $this->createInput($this->name(), $value, $label, $default);
		$option->setDefault($default);
		$this->options[$value] = $option;
		$this->input()->addChild($option);
	}
	
	public function setValue(string $value): void
	{
		$this->default = null;
		foreach($this->options as $optionValue=>$option) {
			$option->setDefault($optionValue == $value);
			if($optionValue == $value) {
				$this->default = $value;
			}
		}
	}
	
	public function hasValue(): bool
	{
		return $this->default !== null;
	}
	
	public function presetValue(): string
	{
		if(!$this->hasValue()) {
			throw new UnsetPropertyException("value");
		}
		return $this->default;
	}
}
