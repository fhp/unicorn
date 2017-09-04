<?php

namespace Unicorn\UI\HTML\Attributes;

trait Low
{
	use AttributeTrait;
	
	public function low(): string
	{
		return $this->property("low");
	}
	
	public function hasLow(): bool
	{
		return $this->hasProperty("low");
	}
	
	public function setLow(string $value): void
	{
		$this->setProperty("low", $value);
	}
}
