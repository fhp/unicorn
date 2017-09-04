<?php

namespace Unicorn\UI\HTML\Attributes;

trait FormAction
{
	use AttributeTrait;
	
	public function formAction(): string
	{
		return $this->property("formaction");
	}
	
	public function hasFormAction(): bool
	{
		return $this->hasProperty("formaction");
	}
	
	public function setFormAction(string $value): void
	{
		$this->setProperty("formaction", $value);
	}
}
