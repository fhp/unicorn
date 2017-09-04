<?php

namespace Unicorn\UI\HTML\Attributes;

trait Type
{
	use AttributeTrait;
	
	public function type(): string
	{
		return $this->property("type");
	}
	
	public function hasType(): bool
	{
		return $this->hasProperty("type");
	}
	
	public function setType(string $value): void
	{
		$this->setProperty("type", $value);
	}
}
