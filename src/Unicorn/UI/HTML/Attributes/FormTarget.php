<?php

namespace Unicorn\UI\HTML\Attributes;

trait FormTarget
{
	use AttributeTrait;
	
	public function formTarget(): string
	{
		return $this->property("formtarget");
	}
	
	public function hasFormTarget(): bool
	{
		return $this->hasProperty("formtarget");
	}
	
	public function setFormTarget(string $value): void
	{
		$this->setProperty("formtarget", $value);
	}
}
