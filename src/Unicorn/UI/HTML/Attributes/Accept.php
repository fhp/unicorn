<?php

namespace Unicorn\UI\HTML\Attributes;

trait Accept
{
	use AttributeTrait;
	
	public function accept(): string
	{
		return $this->property("accept");
	}
	
	public function hasAccept(): bool
	{
		return $this->hasProperty("accept");
	}
	
	public function setAccept(string $value): void
	{
		$this->setProperty("accept", $value);
	}
}
