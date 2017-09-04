<?php

namespace Unicorn\UI\HTML\Attributes;

trait SourceString
{
	use AttributeTrait;
	
	public function sourceString(): string
	{
		return $this->property("srcdoc");
	}
	
	public function hasSourceString(): bool
	{
		return $this->hasProperty("srcdoc");
	}
	
	public function setSourceString(string $value): void
	{
		$this->setProperty("srcdoc", $value);
	}
}
