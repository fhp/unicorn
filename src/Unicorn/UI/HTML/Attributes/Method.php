<?php

namespace Unicorn\UI\HTML\Attributes;

trait Method
{
	use AttributeTrait;
	
	public function method(): string
	{
		return $this->property("method");
	}
	
	public function hasMethod(): bool
	{
		return $this->hasProperty("method");
	}
	
	public function setMethod(string $value): void
	{
		$this->setProperty("method", $value);
	}
}
