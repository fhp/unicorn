<?php

namespace Unicorn\UI\HTML\Attributes;

trait Relation
{
	use AttributeTrait;
	
	public function relation(): string
	{
		return $this->property("rel");
	}
	
	public function hasRelation(): bool
	{
		return $this->hasProperty("rel");
	}
	
	public function setRelation(string $value): void
	{
		$this->setProperty("rel", $value);
	}
}
