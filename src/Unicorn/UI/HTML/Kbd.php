<?php

namespace Unicorn\UI\HTML;

class Kbd extends TextElement
{
	function __construct($text = null)
	{
		parent::__construct("kbd", $text);
	}
}
