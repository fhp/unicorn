<?php

namespace Unicorn\UI\HTML\Attributes;

trait Action
{
	use AttributeTrait;
	
	public function action(): string
	{
		return $this->property("action");
	}
	
	public function hasAction(): bool
	{
		return $this->hasProperty("action");
	}
	
	public function setAction(string $value): void
	{
		$this->setProperty("action", $value);
	}
}
