<?php

namespace Unicorn\UI\HTML;

use Unicorn\UI\HTML\Attributes\Cite;
use Unicorn\UI\HTML\Attributes\DateTime;

class Del extends TextElement
{
	use Cite;
	use DateTime;
	
	function __construct($text = null)
	{
		parent::__construct("del", $text);
	}
}
