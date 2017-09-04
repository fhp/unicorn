<?php

namespace Unicorn\UI\HTML;

class Mark extends TextElement
{
	function __construct($text = null)
	{
		parent::__construct("mark", $text);
	}
}
