<?php

namespace Unicorn\UI\HTML\Attributes;

trait Cite
{
	use AttributeTrait;
	
	public function cite(): string
	{
		return $this->property("cite");
	}
	
	public function hasCite(): bool
	{
		return $this->hasProperty("cite");
	}
	
	public function setCite(string $value): void
	{
		$this->setProperty("cite", $value);
	}
}
