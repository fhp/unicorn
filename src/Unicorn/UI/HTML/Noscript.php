<?php

namespace Unicorn\UI\HTML;

class Noscript extends TextElement
{
	function __construct($text = null)
	{
		parent::__construct("noscript", $text);
	}
}
