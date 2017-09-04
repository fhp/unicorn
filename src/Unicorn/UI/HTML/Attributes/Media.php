<?php

namespace Unicorn\UI\HTML\Attributes;

trait Media
{
	use AttributeTrait;
	
	public function media(): string
	{
		return $this->property("media");
	}
	
	public function hasMedia(): bool
	{
		return $this->hasProperty("media");
	}
	
	public function setMedia(string $value): void
	{
		$this->setProperty("media", $value);
	}
}
