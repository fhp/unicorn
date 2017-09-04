<?php

namespace Unicorn\UI\HTML;

class Strong extends TextElement
{
	function __construct($text = null)
	{
		parent::__construct("strong", $text);
	}
}
