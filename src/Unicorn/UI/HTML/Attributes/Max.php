<?php

namespace Unicorn\UI\HTML\Attributes;

trait Max
{
	use AttributeTrait;
	
	public function max(): string
	{
		return $this->property("max");
	}
	
	public function hasMax(): bool
	{
		return $this->hasProperty("max");
	}
	
	public function setMax(string $value): void
	{
		$this->setProperty("max", $value);
	}
}
