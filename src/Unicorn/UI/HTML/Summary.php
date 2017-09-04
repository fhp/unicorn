<?php

namespace Unicorn\UI\HTML;

class Summary extends TextElement
{
	function __construct($text = null)
	{
		parent::__construct("summary", $text);
	}
}
