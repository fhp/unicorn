<?php

namespace Unicorn\UI\HTML\Attributes;

trait TargetLanguage
{
	use AttributeTrait;
	
	public function targetLanguage(): string
	{
		return $this->property("hreflang");
	}
	
	public function hasTargetLanguage(): bool
	{
		return $this->hasProperty("hreflang");
	}
	
	public function setTargetLanguage(string $value): void
	{
		$this->setProperty("hreflang", $value);
	}
}
