<?php

namespace Unicorn\UI\HTML;

class Paragraph extends TextElement
{
	function __construct($text = null)
	{
		parent::__construct("p", $text);
	}
}
