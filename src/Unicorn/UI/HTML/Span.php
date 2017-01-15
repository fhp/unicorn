<?php

namespace Unicorn\UI\HTML;

use Unicorn\UI\Base\TextElement;

class Span extends TextElement
{
	function __construct(string $text = null)
	{
		parent::__construct("span", $text);
	}
}
