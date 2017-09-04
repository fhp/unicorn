<?php

namespace Unicorn\UI\HTML\Attributes;

trait DataUrl
{
	use AttributeTrait;
	
	public function dataUrl(): string
	{
		return $this->property("data");
	}
	
	public function hasDataUrl(): bool
	{
		return $this->hasProperty("data");
	}
	
	public function setDataUrl(string $value): void
	{
		$this->setProperty("data", $value);
	}
}
