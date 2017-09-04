<?php

namespace Unicorn\UI\HTML\Attributes;

trait Height
{
	use AttributeTrait;
	
	public function height(): string
	{
		return $this->property("height");
	}
	
	public function hasHeight(): bool
	{
		return $this->hasProperty("height");
	}
	
	public function setHeight(string $value): void
	{
		$this->setProperty("height", $value);
	}
}
