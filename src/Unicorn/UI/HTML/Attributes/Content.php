<?php

namespace Unicorn\UI\HTML\Attributes;

trait Content
{
	use AttributeTrait;
	
	public function content(): string
	{
		return $this->property("content");
	}
	
	public function hasContent(): bool
	{
		return $this->hasProperty("content");
	}
	
	public function setContent(string $value): void
	{
		$this->setProperty("content", $value);
	}
}
