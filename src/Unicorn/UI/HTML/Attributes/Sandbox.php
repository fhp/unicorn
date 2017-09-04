<?php

namespace Unicorn\UI\HTML\Attributes;

trait Sandbox
{
	use AttributeTrait;
	
	public function sandbox(): string
	{
		return $this->property("sandbox");
	}
	
	public function hasSandbox(): bool
	{
		return $this->hasProperty("sandbox");
	}
	
	public function setSandbox(string $value): void
	{
		$this->setProperty("sandbox", $value);
	}
}
