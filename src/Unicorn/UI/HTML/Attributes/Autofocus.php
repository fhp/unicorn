<?php

namespace Unicorn\UI\HTML\Attributes;

trait Autofocus
{
	use AttributeTrait;
	
	public function hasAutofocus(): bool
	{
		return $this->hasProperty("autofocus");
	}
	
	public function setAutofocus($value = true): void
	{
		if($value) {
			$this->setProperty("autofocus", "autofocus");
		} else {
			$this->removeProperty("autofocus");
		}
	}
}
