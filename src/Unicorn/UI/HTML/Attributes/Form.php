<?php

namespace Unicorn\UI\HTML\Attributes;

trait Form
{
	use AttributeTrait;
	
	public function form(): string
	{
		return $this->property("form");
	}
	
	public function hasForm(): bool
	{
		return $this->hasProperty("form");
	}
	
	public function setForm(string $value): void
	{
		$this->setProperty("form", $value);
	}
}