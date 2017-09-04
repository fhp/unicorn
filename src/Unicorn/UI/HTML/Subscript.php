<?php

namespace Unicorn\UI\HTML;

class Subscript extends TextElement
{
	function __construct($text = null)
	{
		parent::__construct("sub", $text);
	}
}
