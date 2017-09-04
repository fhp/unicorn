<?php

namespace Unicorn\UI\HTML\Attributes;

trait FormMethod
{
	use AttributeTrait;
	
	public function formMethod(): string
	{
		return $this->property("formmethod");
	}
	
	public function hasFormMethod(): bool
	{
		return $this->hasProperty("formmethod");
	}
	
	public function setFormMethod(string $value): void
	{
		$this->setProperty("formmethod", $value);
	}
}
