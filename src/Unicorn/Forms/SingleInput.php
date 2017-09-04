<?php

namespace Unicorn\Forms;

use Unicorn\UI\Base\HtmlElement;
use Unicorn\UI\Exceptions\UnsetPropertyException;

abstract class SingleInput extends AbstractInput
{
	function __construct(Form $form, string $type, string $id, string $label = null, string $name = null)
	{
		$input = new HtmlElement("input");
		$input->setProperty("type", $type);
		$input->setID($id);
		
		parent::__construct($form, $input, $label, $name);
		
		$input->setProperty("name", $this->name());
	}
	
	public function setValue(string $value): void
	{
		$this->input()->setProperty("value", $value);
	}
	
	public function hasValue(): bool
	{
		return $this->input()->hasProperty("value");
	}
	
	public function presetValue(): string
	{
		if(!$this->hasValue()) {
			throw new UnsetPropertyException("value");
		}
		return $this->input()->property("value");
	}
}
