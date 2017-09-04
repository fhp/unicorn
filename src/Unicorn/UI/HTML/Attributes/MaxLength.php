<?php

namespace Unicorn\UI\HTML\Attributes;

trait MaxLength
{
	use AttributeTrait;
	
	public function maxlength(): string
	{
		return $this->property("maxlength");
	}
	
	public function hasMaxlength(): bool
	{
		return $this->hasProperty("maxlength");
	}
	
	public function setMaxlength(string $value): void
	{
		$this->setProperty("maxlength", $value);
	}
}
