<?php

namespace Unicorn\UI\HTML\Attributes;

trait Label
{
	use AttributeTrait;
	
	public function label(): string
	{
		return $this->property("label");
	}
	
	public function hasLabel(): bool
	{
		return $this->hasProperty("label");
	}
	
	public function setLabel(string $value): void
	{
		$this->setProperty("label", $value);
	}
}
