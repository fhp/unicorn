<?php

namespace Unicorn\UI\HTML;

use Unicorn\UI\Bootstrap\TextElement;

class Link extends TextElement
{
	public function __construct(string $url)
	{
		parent::__construct("a");
		$this->setProperty("href", $url);
	}
	
	public function setTarget(string $target): void
	{
		$this->setProperty("target", $target);
	}
	
	public function target(): string
	{
		return $this->property("target");
	}
	
	public function hasTarget(): bool
	{
		return $this->hasProperty("target");
	}
	
	public function openInNewPage()
	{
		$this->setTarget("_blank");
	}
}
