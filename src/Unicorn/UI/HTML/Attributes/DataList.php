<?php

namespace Unicorn\UI\HTML\Attributes;

trait DataList
{
	use AttributeTrait;
	
	public function list(): string
	{
		return $this->property("list");
	}
	
	public function hasList(): bool
	{
		return $this->hasProperty("list");
	}
	
	public function setList(string $value): void
	{
		$this->setProperty("list", $value);
	}
}
