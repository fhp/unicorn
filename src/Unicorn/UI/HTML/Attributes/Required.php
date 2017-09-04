<?php

namespace Unicorn\UI\HTML\Attributes;

trait Required
{
	use AttributeTrait;
	
	public function isRequired(): bool
	{
		return $this->hasProperty("required");
	}
	
	public function setRequired(bool $value = true): void
	{
		if($value) {
			$this->setProperty("required", "required");
		} else {
			$this->removeProperty("required");
		}
	}
}
