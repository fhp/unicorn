<?php

namespace Unicorn\UI\HTML;

use Unicorn\UI\Bootstrap\TextElement;

class Paragraph extends TextElement
{
	function __construct(string $text = null)
	{
		parent::__construct("p", $text);
	}
}
