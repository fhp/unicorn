<?php

namespace Unicorn\UI\HTML\Attributes;

trait Placeholder
{
	use AttributeTrait;
	
	public function placeholder(): string
	{
		return $this->property("placeholder");
	}
	
	public function hasPlaceholder(): bool
	{
		return $this->hasProperty("placeholder");
	}
	
	public function setPlaceholder(string $value): void
	{
		$this->setProperty("placeholder", $value);
	}
}
