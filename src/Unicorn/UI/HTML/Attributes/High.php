<?php

namespace Unicorn\UI\HTML\Attributes;

trait High
{
	use AttributeTrait;
	
	public function high(): string
	{
		return $this->property("high");
	}
	
	public function hasHigh(): bool
	{
		return $this->hasProperty("high");
	}
	
	public function setHigh(string $value): void
	{
		$this->setProperty("high", $value);
	}
}
