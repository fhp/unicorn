<?php

namespace Unicorn\UI\HTML\Attributes;

trait Sorted
{
	use AttributeTrait;
	
	public function sorted(): string
	{
		return $this->property("sorted");
	}
	
	public function hasSorted(): bool
	{
		return $this->hasProperty("sorted");
	}
	
	public function setSorted(string $value): void
	{
		$this->setProperty("sorted", $value);
	}
}
