<?php

namespace Unicorn\UI\HTML;

class Superscript extends TextElement
{
	function __construct($text = null)
	{
		parent::__construct("sup", $text);
	}
}
