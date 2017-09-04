<?php

namespace Unicorn\UI\HTML\Attributes;

trait Autocomplete
{
	use AttributeTrait;
	
	public function autocomplete(): string
	{
		return $this->property("autocomplete");
	}
	
	public function hasAutocomplete(): bool
	{
		return $this->hasProperty("autocomplete");
	}
	
	public function setAutocomplete(string $value): void
	{
		$this->setProperty("autocomplete", $value);
	}
}
