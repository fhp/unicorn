<?php

namespace Unicorn\UI\HTML;

use Unicorn\UI\HTML\Attributes\Cite;

class Quote extends TextElement
{
	use Cite;
	
	function __construct($text = null)
	{
		parent::__construct("q", $text);
	}
}
