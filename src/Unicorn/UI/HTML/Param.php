<?php

namespace Unicorn\UI\HTML;

use Unicorn\UI\Base\ChildlessHtmlElement;
use Unicorn\UI\HTML\Attributes\Name;
use Unicorn\UI\HTML\Attributes\Value;

class Param extends ChildlessHtmlElement
{
	use Name;
	use Value;
	
	function __construct(string $name = null, string $value = null)
	{
		parent::__construct("param");
		
		if($name !== null) {
			$this->setName($name);
		}
		
		if($value !== null) {
			$this->setValue($value);
		}
	}
}
