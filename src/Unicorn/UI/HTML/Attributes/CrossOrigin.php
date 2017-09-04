<?php

namespace Unicorn\UI\HTML\Attributes;

trait CrossOrigin
{
	use AttributeTrait;
	
	public function crossorigin(): string
	{
		return $this->property("crossorigin");
	}
	
	public function hasCrossorigin(): bool
	{
		return $this->hasProperty("crossorigin");
	}
	
	public function setCrossorigin(string $value): void
	{
		$this->setProperty("crossorigin", $value);
	}
}
