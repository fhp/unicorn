<?php

namespace Unicorn\UI\HTML\Attributes;

trait OpenTarget
{
	use AttributeTrait;
	
	public function openTarget(): string
	{
		return $this->property("target");
	}
	
	public function hasOpenTarget(): bool
	{
		return $this->hasProperty("target");
	}
	
	public function setOpenTarget(string $value): void
	{
		$this->setProperty("target", $value);
	}
	
	public function openInNewPage()
	{
		$this->setOpenTarget("_blank");
	}
}
