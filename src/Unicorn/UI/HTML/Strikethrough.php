<?php

namespace Unicorn\UI\HTML;

class Strikethrough extends TextElement
{
	function __construct($text = null)
	{
		parent::__construct("s", $text);
	}
}
