<?php

namespace Unicorn\UI\HTML\Attributes;

trait Enctype
{
	use AttributeTrait;
	
	public function enctype(): string
	{
		return $this->property("enctype");
	}
	
	public function hasEnctype(): bool
	{
		return $this->hasProperty("enctype");
	}
	
	public function setEnctype(string $value): void
	{
		$this->setProperty("enctype", $value);
	}
}
