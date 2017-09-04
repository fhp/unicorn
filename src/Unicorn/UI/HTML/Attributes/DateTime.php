<?php

namespace Unicorn\UI\HTML\Attributes;

trait DateTime
{
	use AttributeTrait;
	
	public function datetime(): string
	{
		return $this->property("datetime");
	}
	
	public function hasDatetime(): bool
	{
		return $this->hasProperty("datetime");
	}
	
	public function setDatetime(string $value): void
	{
		$this->setProperty("datetime", $value);
	}
}
