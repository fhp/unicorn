<?php

namespace Unicorn\UI\HTML\Attributes;

trait Dirname
{
	use AttributeTrait;
	
	public function dirname(): string
	{
		return $this->property("dirname");
	}
	
	public function hasDirname(): bool
	{
		return $this->hasProperty("dirname");
	}
	
	public function setDirname(string $value): void
	{
		$this->setProperty("dirname", $value);
	}
}
