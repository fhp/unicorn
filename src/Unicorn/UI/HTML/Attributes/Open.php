<?php

namespace Unicorn\UI\HTML\Attributes;

trait Open
{
	use AttributeTrait;
	
	public function isOpen(): bool
	{
		return $this->hasProperty("open");
	}
	
	public function setOpen(bool $value): void
	{
		if($value) {
			$this->setProperty("open", "open");
		} else {
			$this->removeProperty("open");
		}
	}
}
