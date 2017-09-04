<?php

namespace Unicorn\UI\HTML;

use Unicorn\UI\HTML\Attributes\Value;

class Data extends TextElement
{
	use Value;
	
	function __construct($value = null, $text = null)
	{
		parent::__construct("data", $text);
		
		if($value !== null) {
			$this->setValue($value);
		}
	}
}
