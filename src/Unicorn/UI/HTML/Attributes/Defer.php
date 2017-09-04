<?php

namespace Unicorn\UI\HTML\Attributes;

trait Defer
{
	use AttributeTrait;
	
	public function defer(): string
	{
		return $this->property("defer");
	}
	
	public function hasDefer(): bool
	{
		return $this->hasProperty("defer");
	}
	
	public function setDefer(string $value): void
	{
		$this->setProperty("defer", $value);
	}
}
