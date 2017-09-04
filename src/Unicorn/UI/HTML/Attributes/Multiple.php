<?php

namespace Unicorn\UI\HTML\Attributes;

trait Multiple
{
	use AttributeTrait;
	
	public function multiple(): string
	{
		return $this->property("multiple");
	}
	
	public function hasMultiple(): bool
	{
		return $this->hasProperty("multiple");
	}
	
	public function setMultiple(string $value): void
	{
		$this->setProperty("multiple", $value);
	}
}
