<?php

namespace Unicorn\UI\HTML\Attributes;

trait Optimum
{
	use AttributeTrait;
	
	public function optimum(): string
	{
		return $this->property("optimum");
	}
	
	public function hasOptimum(): bool
	{
		return $this->hasProperty("optimum");
	}
	
	public function setOptimum(string $value): void
	{
		$this->setProperty("optimum", $value);
	}
}
