<?php

namespace Unicorn\UI\HTML\Attributes;

trait Width
{
	use AttributeTrait;
	
	public function width(): string
	{
		return $this->property("width");
	}
	
	public function hasWidth(): bool
	{
		return $this->hasProperty("width");
	}
	
	public function setWidth(string $value): void
	{
		$this->setProperty("width", $value);
	}
}
