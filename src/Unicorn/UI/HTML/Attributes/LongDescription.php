<?php

namespace Unicorn\UI\HTML\Attributes;

trait LongDescription
{
	use AttributeTrait;
	
	public function longDescription(): string
	{
		return $this->property("longdesc");
	}
	
	public function hasLongDescription(): bool
	{
		return $this->hasProperty("longdesc");
	}
	
	public function setLongDescription(string $value): void
	{
		$this->setProperty("longdesc", $value);
	}
}
