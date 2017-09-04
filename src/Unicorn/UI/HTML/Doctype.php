<?php

namespace Unicorn\UI\HTML;

use Unicorn\UI\Base\Widget;

class Doctype implements Widget
{
	public function render(): string
	{
		 return "<!DOCTYPE html>";
	}
	
	public function isActive(): bool
	{
		return false;
	}
}
