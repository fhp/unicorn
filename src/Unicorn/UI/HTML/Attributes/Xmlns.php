<?php

namespace Unicorn\UI\HTML\Attributes;

trait Xmlns
{
	use AttributeTrait;
	
	public function xmlns(): string
	{
		return $this->property("xmlns");
	}
	
	public function hasXmlns(): bool
	{
		return $this->hasProperty("xmlns");
	}
	
	public function setXmlns(string $value): void
	{
		$this->setProperty("xmlns", $value);
	}
}
