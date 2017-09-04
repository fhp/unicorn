<?php

namespace Unicorn\UI\HTML\Attributes;

trait Step
{
	use AttributeTrait;
	
	public function step(): string
	{
		return $this->property("step");
	}
	
	public function hasStep(): bool
	{
		return $this->hasProperty("step");
	}
	
	public function setStep(string $value): void
	{
		$this->setProperty("step", $value);
	}
}
