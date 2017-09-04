<?php

namespace Unicorn\UI\HTML\Attributes;

trait SourceSet
{
	use AttributeTrait;
	
	public function sourceSet(): string
	{
		return $this->property("srcset");
	}
	
	public function hasSourceSet(): bool
	{
		return $this->hasProperty("srcset");
	}
	
	public function setSourceSet(string $value): void
	{
		$this->setProperty("srcset", $value);
	}
}
