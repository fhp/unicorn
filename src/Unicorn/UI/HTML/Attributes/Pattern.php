<?php

namespace Unicorn\UI\HTML\Attributes;

trait Pattern
{
	use AttributeTrait;
	
	public function pattern(): string
	{
		return $this->property("pattern");
	}
	
	public function hasPattern(): bool
	{
		return $this->hasProperty("pattern");
	}
	
	public function setPattern(string $value): void
	{
		$this->setProperty("pattern", $value);
	}
}
