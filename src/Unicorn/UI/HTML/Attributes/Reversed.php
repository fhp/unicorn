<?php

namespace Unicorn\UI\HTML\Attributes;

trait Reversed
{
	use AttributeTrait;
	
	public function isReversed(): bool
	{
		return $this->hasProperty("reversed");
	}
	
	public function setReversed(bool $value = true): void
	{
		if($value) {
			$this->setProperty("reversed", "reversed");
		} else {
			$this->removeProperty("reversed");
		}
	}
}
