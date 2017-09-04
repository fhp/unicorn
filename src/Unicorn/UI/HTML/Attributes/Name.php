<?php

namespace Unicorn\UI\HTML\Attributes;

trait Name
{
	use AttributeTrait;
	
	public function name(): string
	{
		return $this->property("name");
	}
	
	public function hasName(): bool
	{
		return $this->hasProperty("name");
	}
	
	public function setName(string $value): void
	{
		$this->setProperty("name", $value);
	}
}
