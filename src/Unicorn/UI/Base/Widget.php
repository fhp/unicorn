<?php

namespace Unicorn\UI\Base;

abstract class Widget
{
	abstract public function render(): string;
	
	public function __toString(): string
	{
		return $this->render();
	}
}
