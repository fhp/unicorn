<?php

namespace Unicorn\UI\HTML;

class DT extends TextElement
{
	function __construct($text = null)
	{
		parent::__construct("dt", $text);
	}
}
