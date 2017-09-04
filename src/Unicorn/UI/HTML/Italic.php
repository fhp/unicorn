<?php

namespace Unicorn\UI\HTML;

class Italic extends TextElement
{
	function __construct(string $text = null)
	{
		parent::__construct("i", $text);
	}
}
