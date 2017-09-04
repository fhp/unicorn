<?php

namespace Unicorn\UI\HTML\Attributes;

trait ForElement
{
	use AttributeTrait;
	
	public function for(): string
	{
		return $this->property("for");
	}
	
	public function hasFor(): bool
	{
		return $this->hasProperty("for");
	}
	
	public function setFor(string $value): void
	{
		$this->setProperty("for", $value);
	}
}
