<?php

namespace Unicorn\UI\HTML\Attributes;

trait Source
{
	use AttributeTrait;
	
	public function source(): string
	{
		return $this->property("src");
	}
	
	public function hasSource(): bool
	{
		return $this->hasProperty("src");
	}
	
	public function setSource(string $value): void
	{
		$this->setProperty("src", $value);
	}
}
