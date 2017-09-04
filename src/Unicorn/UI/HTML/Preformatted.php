<?php

namespace Unicorn\UI\HTML;

class Preformatted extends TextElement
{
	function __construct($text = null)
	{
		parent::__construct("pre", $text);
	}
}
