<?php

namespace Unicorn\UI\HTML;

class Underline extends TextElement
{
	function __construct($text = null)
	{
		parent::__construct("u", $text);
	}
}
