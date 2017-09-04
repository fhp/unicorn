<?php

namespace Unicorn\UI\HTML\Attributes;

trait Colspan
{
	use AttributeTrait;
	
	public function colspan(): string
	{
		return $this->property("colspan");
	}
	
	public function hasColspan(): bool
	{
		return $this->hasProperty("colspan");
	}
	
	public function setColspan(string $value): void
	{
		$this->setProperty("colspan", $value);
	}
}
