<?php

namespace Unicorn\UI\HTML\Attributes;

trait Scope
{
	use AttributeTrait;
	
	public function scope(): string
	{
		return $this->property("scope");
	}
	
	public function hasScope(): bool
	{
		return $this->hasProperty("scope");
	}
	
	public function setScope(string $value): void
	{
		$this->setProperty("scope", $value);
	}
}
