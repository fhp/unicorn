<?php

namespace Unicorn\UI\HTML;

use Unicorn\UI\HTML\Attributes\DateTime;

class Time extends TextElement
{
	use DateTime;
	
	function __construct($text = null)
	{
		parent::__construct("time", $text);
	}
}
