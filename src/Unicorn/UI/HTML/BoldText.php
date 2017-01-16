<?php

namespace Unicorn\UI\HTML;

use Unicorn\UI\Bootstrap\TextElement;

class BoldText extends TextElement
{
	function __construct(string $text = null)
	{
		parent::__construct("b", $text);
	}
}
