<?php

namespace Unicorn\UI\HTML\Attributes;

trait Rowspan
{
	use AttributeTrait;
	
	public function rowspan(): string
	{
		return $this->property("rowspan");
	}
	
	public function hasRowspan(): bool
	{
		return $this->hasProperty("rowspan");
	}
	
	public function setRowspan(string $value): void
	{
		$this->setProperty("rowspan", $value);
	}
}
