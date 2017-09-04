<?php

namespace Unicorn\UI\HTML;

class Caption extends TextElement
{
	function __construct($text = null)
	{
		parent::__construct("caption", $text);
	}
}
