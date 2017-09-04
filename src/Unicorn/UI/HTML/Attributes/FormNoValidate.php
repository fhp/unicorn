<?php

namespace Unicorn\UI\HTML\Attributes;

trait FormNoValidate
{
	use AttributeTrait;
	
	public function hasFormNoValidate(): bool
	{
		return $this->hasProperty("formnovalidate");
	}
	
	public function setFormNoValidate(string $value): void
	{
		if($value) {
			$this->setProperty("formnovalidate", "formnovalidate");
		} else {
			$this->removeProperty("formnovalidate");
		}
	}
}
