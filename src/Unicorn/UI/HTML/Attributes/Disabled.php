<?php

namespace Unicorn\UI\HTML\Attributes;

trait Disabled
{
	use AttributeTrait;
	
	public function isDisabled(): bool
	{
		return $this->hasProperty("disabled");
	}
	
	public function setDisabled($value = true): void
	{
		if($value) {
			$this->setProperty("disabled", "disabled");
		} else {
			$this->removeProperty("disabled");
		}
	}
}
