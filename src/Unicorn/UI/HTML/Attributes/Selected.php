<?php

namespace Unicorn\UI\HTML\Attributes;

trait Selected
{
	use AttributeTrait;
	
	public function isSelected(): bool
	{
		return $this->hasProperty("selected");
	}
	
	public function setSelected($value = true): void
	{
		if($value) {
			$this->setProperty("selected", "selected");
		} else {
			$this->removeProperty("selected");
		}
	}
}
