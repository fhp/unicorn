<?php

namespace Unicorn\UI\HTML\Attributes;

Trait Target
{
	use AttributeTrait;
	
	public function target(): string
	{
		return $this->property("href");
	}
	
	public function hasTarget(): bool
	{
		return $this->hasProperty("href");
	}
	
	public function setTarget(string $value): void
	{
		$this->setProperty("href", $value);
	}
}
