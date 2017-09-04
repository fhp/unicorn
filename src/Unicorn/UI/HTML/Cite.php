<?php

namespace Unicorn\UI\HTML;

class Cite extends TextElement
{
	function __construct($text = null)
	{
		parent::__construct("cite", $text);
	}
}
