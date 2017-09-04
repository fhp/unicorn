<?php

namespace Unicorn\UI\HTML\Attributes;

trait Start
{
	use AttributeTrait;
	
	public function start(): string
	{
		return $this->property("start");
	}
	
	public function hasStart(): bool
	{
		return $this->hasProperty("start");
	}
	
	public function setStart(string $value): void
	{
		$this->setProperty("start", $value);
	}
}
