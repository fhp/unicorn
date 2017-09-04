<?php

namespace Unicorn\UI\HTML\Attributes;

trait Usemap
{
	use AttributeTrait;
	
	public function usemap(): string
	{
		return $this->property("usemap");
	}
	
	public function hasUsemap(): bool
	{
		return $this->hasProperty("usemap");
	}
	
	public function setUsemap(string $value): void
	{
		$this->setProperty("usemap", $value);
	}
}
