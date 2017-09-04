<?php

namespace Unicorn\UI\HTML\Attributes;

trait Abbr
{
	use AttributeTrait;
	
	public function abbr(): string
	{
		return $this->property("abbr");
	}
	
	public function hasAbbr(): bool
	{
		return $this->hasProperty("abbr");
	}
	
	public function setAbbr(string $value): void
	{
		$this->setProperty("abbr", $value);
	}
}
