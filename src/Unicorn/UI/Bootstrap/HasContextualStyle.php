<?php

namespace Unicorn\UI\Bootstrap;

trait HasContextualStyle
{
	public function setContextualStyle(ContextualStyle $style): void
	{
		$this->addClass("text-" . $style);
	}
	
	public function setContextualBackgroundStyle(ContextualStyle $style): void
	{
		$this->addClass("bg-" . $style);
	}
	
	abstract function addClass(string $class): void;
}
