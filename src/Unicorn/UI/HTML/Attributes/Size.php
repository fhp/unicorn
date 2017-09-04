<?php

namespace Unicorn\UI\HTML\Attributes;

trait Size
{
	use AttributeTrait;
	
	public function size(): string
	{
		return $this->property("size");
	}
	
	public function hasSize(): bool
	{
		return $this->hasProperty("size");
	}
	
	public function setSize(string $value): void
	{
		$this->setProperty("size", $value);
	}
}
