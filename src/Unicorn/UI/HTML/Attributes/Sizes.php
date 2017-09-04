<?php

namespace Unicorn\UI\HTML\Attributes;

trait Sizes
{
	use AttributeTrait;
	
	public function sizes(): string
	{
		return $this->property("sizes");
	}
	
	public function hasSizes(): bool
	{
		return $this->hasProperty("sizes");
	}
	
	public function setSizes(string $value): void
	{
		$this->setProperty("sizes", $value);
	}
}
