<?php

namespace Unicorn\UI\HTML\Attributes;

trait NoValidate
{
	use AttributeTrait;
	
	public function novalidate(): string
	{
		return $this->property("novalidate");
	}
	
	public function hasNovalidate(): bool
	{
		return $this->hasProperty("novalidate");
	}
	
	public function setNovalidate(string $value): void
	{
		$this->setProperty("novalidate", $value);
	}
}
