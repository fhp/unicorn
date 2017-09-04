<?php

namespace Unicorn\UI\HTML;

class Figcaption extends TextElement
{
	function __construct($text = null)
	{
		parent::__construct("figcaption", $text);
	}
}
