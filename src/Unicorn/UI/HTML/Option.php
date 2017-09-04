<?php

namespace Unicorn\UI\HTML;

use Unicorn\UI\HTML\Attributes\Disabled;
use Unicorn\UI\HTML\Attributes\Label;
use Unicorn\UI\HTML\Attributes\Selected;
use Unicorn\UI\HTML\Attributes\Value;

class Option extends TextElement
{
	use Value;
	use Label;
	use Disabled;
	use Selected;
	
	function __construct(string $value = null, string $text = null)
	{
		parent::__construct("option", $text);
		
		if($value !== null) {
			$this->setValue($value);
		}
	}
}
