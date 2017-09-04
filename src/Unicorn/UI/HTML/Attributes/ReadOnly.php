<?php

namespace Unicorn\UI\HTML\Attributes;

trait ReadOnly
{
	use AttributeTrait;
	
	public function isReadonly(): bool
	{
		return $this->hasProperty("readonly");
	}
	
	public function setReadonly(bool $value = true): void
	{
		if($value) {
			$this->setProperty("readonly", "readonly");
		} else {
			$this->removeProperty("readonly");
		}
	}
}
