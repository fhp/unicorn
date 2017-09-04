<?php

namespace Unicorn\UI\HTML\Attributes;

trait KeyType
{
	use AttributeTrait;
	
	public function keytype(): string
	{
		return $this->property("keytype");
	}
	
	public function hasKeytype(): bool
	{
		return $this->hasProperty("keytype");
	}
	
	public function setKeytype(string $value): void
	{
		$this->setProperty("keytype", $value);
	}
}
