<?php

namespace Unicorn\UI\HTML;

class Code extends TextElement
{
	function __construct($text = null)
	{
		parent::__construct("code", $text);
	}
}
