<?php

namespace Unicorn\UI\HTML\Attributes;

trait Min
{
	use AttributeTrait;
	
	public function min(): string
	{
		return $this->property("min");
	}
	
	public function hasMin(): bool
	{
		return $this->hasProperty("min");
	}
	
	public function setMin(string $value): void
	{
		$this->setProperty("min", $value);
	}
}
