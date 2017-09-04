<?php

namespace Unicorn\UI\HTML\Attributes;

trait IsMap
{
	use AttributeTrait;
	
	public function isMap(): bool
	{
		return $this->hasProperty("ismap");
	}
	
	public function setIsMap(bool $value = true): void
	{
		if($value) {
			$this->setProperty("ismap", "ismap");
		} else {
			$this->removeProperty("ismap");
		}
	}
}
