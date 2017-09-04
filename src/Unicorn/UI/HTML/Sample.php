<?php

namespace Unicorn\UI\HTML;

class Sample extends TextElement
{
	function __construct($text = null)
	{
		parent::__construct("samp", $text);
	}
}
