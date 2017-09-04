<?php

namespace Unicorn\UI\HTML\Attributes;

trait Scoped
{
	use AttributeTrait;
	
	public function isScoped(): bool
	{
		return $this->hasProperty("scoped");
	}
	
	public function setScoped(bool $value = true): void
	{
		if($value) {
			$this->setProperty("scoped", "scoped");
		} else {
			$this->removeProperty("scoped");
		}
	}
}
