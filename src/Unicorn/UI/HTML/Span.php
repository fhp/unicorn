<?php

namespace Unicorn\UI\HTML;

class Span extends TextElement
{
	function __construct($class = null, string $text = null)
	{
		parent::__construct("span", $text);
		
		if($class === null) {
			// do nothing
		} else if(is_array($class)) {
			foreach($class as $c) {
				$this->addClass($c);
			}
		} else {
			$this->addClass($class);
		}
	}
}
