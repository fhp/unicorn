<?php

namespace Unicorn\UI\HTML\Attributes;

trait AltText
{
	use AttributeTrait;
	
	public function altText(): string
	{
		return $this->property("alt");
	}
	
	public function hasAltText(): bool
	{
		return $this->hasProperty("alt");
	}
	
	public function setAltText(string $value): void
	{
		$this->setProperty("alt", $value);
	}
}
