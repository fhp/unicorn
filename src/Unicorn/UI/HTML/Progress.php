<?php

namespace Unicorn\UI\HTML;

use Unicorn\UI\Base\HtmlElement;
use Unicorn\UI\HTML\Attributes\Max;
use Unicorn\UI\HTML\Attributes\Value;

class Progress extends HtmlElement
{
	use Max;
	use Value;
	
	function __construct($id = null, $value = null, $max = null)
	{
		parent::__construct("progress");
		
		if($id !== null) {
			$this->setID($id);
		}
		
		if($value !== null) {
			$this->setValue($value);
		}
		
		if($max !== null) {
			$this->setMax($max);
		}
	}
}
