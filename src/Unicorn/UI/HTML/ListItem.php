<?php

namespace Unicorn\UI\HTML;

use Unicorn\UI\HTML\Attributes\Value;

class ListItem extends TextElement
{
	use Value;
	
	function __construct($text = null)
	{
		parent::__construct("li", $text);
	}
}
