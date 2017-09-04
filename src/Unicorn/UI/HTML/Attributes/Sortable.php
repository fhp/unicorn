<?php

namespace Unicorn\UI\HTML\Attributes;

trait Sortable
{
	use AttributeTrait;
	
	public function isSortable(): bool
	{
		return $this->hasProperty("sortable");
	}
	
	public function setSortable($value = true): void
	{
		if($value) {
			$this->setProperty("sortable", "sortable");
		} else {
			$this->removeProperty("sortable");
		}
	}
}
