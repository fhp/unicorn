<?php

namespace Unicorn\UI\HTML\Attributes;

trait HttpEquiv
{
	use AttributeTrait;
	
	public function httpEquiv(): string
	{
		return $this->property("http-equiv");
	}
	
	public function hasHttpEquiv(): bool
	{
		return $this->hasProperty("http-equiv");
	}
	
	public function setHttpEquiv(string $value): void
	{
		$this->setProperty("http-equiv", $value);
	}
}
