<?php

namespace Unicorn\UI\HTML;

class Variable extends TextElement
{
	function __construct($text = null)
	{
		parent::__construct("var", $text);
	}
}
