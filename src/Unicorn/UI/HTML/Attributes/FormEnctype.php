<?php

namespace Unicorn\UI\HTML\Attributes;

trait FormEnctype
{
	use AttributeTrait;
	
	public function formEnctype(): string
	{
		return $this->property("formenctype");
	}
	
	public function hasFormEnctype(): bool
	{
		return $this->hasProperty("formenctype");
	}
	
	public function setFormEnctype(string $value): void
	{
		$this->setProperty("formenctype", $value);
	}
}
