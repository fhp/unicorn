<?php

namespace Unicorn\UI\HTML\Attributes;

trait Value
{
	use AttributeTrait;
	
	public function value(): string
	{
		return $this->property("value");
	}
	
	public function hasValue(): bool
	{
		return $this->hasProperty("value");
	}
	
	public function setValue(string $value): void
	{
		$this->setProperty("value", $value);
	}
}
