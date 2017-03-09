<?php

namespace Unicorn\Forms;

use Unicorn\UI\Base\HtmlElement;
use Unicorn\UI\Exceptions\UnsetPropertyException;

abstract class SingleInput extends AbstractInput
{
	function __construct(Form $form, string $type, string $id, string $label = null, string $name = null)
	{
		parent::__construct($form, new HtmlElement("input"), $id, $label, $name);
		
		$this->input()->setProperty("type", $type);
		$this->input()->setProperty("name", $this->name());
		$this->input()->setID($id);
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
