<?php

namespace Unicorn\UI\HTML\Attributes;

trait Checked
{
	use AttributeTrait;
	
	public function isChecked(): bool
	{
		return $this->hasProperty("checked");
	}
	
	public function setChecked(bool $value = true): void
	{
		if($value) {
			$this->setProperty("checked", "checked");
		} else {
			$this->removeProperty("checked");
		}
	}
}
