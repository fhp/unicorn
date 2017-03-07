<?php

namespace Unicorn\UI\HTML;

use Unicorn\UI\Base\HtmlElement;

class Div extends HtmlElement
{
	function __construct($class = null)
	{
		parent::__construct("div");
		
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
