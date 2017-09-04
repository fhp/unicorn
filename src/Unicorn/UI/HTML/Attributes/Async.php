<?php

namespace Unicorn\UI\HTML\Attributes;

trait Async
{
	use AttributeTrait;
	
	public function async(): string
	{
		return $this->property("async");
	}
	
	public function hasAsync(): bool
	{
		return $this->hasProperty("async");
	}
	
	public function setAsync(string $value): void
	{
		$this->setProperty("async", $value);
	}
}
