<?php

namespace Unicorn\UI\HTML\Attributes;

trait Challenge
{
	use AttributeTrait;
	
	public function hasChallenge(): bool
	{
		return $this->hasProperty("challenge");
	}
	
	public function setChallenge(bool $value = true): void
	{
		if($value) {
			$this->setProperty("challenge", "challenge");
		} else {
			$this->removeProperty("challenge");
		}
	}
}
