<?php

namespace Unicorn\UI\HTML;

use Unicorn\UI\HTML\Attributes\Form;
use Unicorn\UI\HTML\Attributes\High;
use Unicorn\UI\HTML\Attributes\Low;
use Unicorn\UI\HTML\Attributes\Max;
use Unicorn\UI\HTML\Attributes\Min;
use Unicorn\UI\HTML\Attributes\Optimum;
use Unicorn\UI\HTML\Attributes\Value;

class Meter extends TextElement
{
	use Form;
	use High;
	use Low;
	use Min;
	use Max;
	use Optimum;
	use Value;
	
	function __construct($text = null)
	{
		parent::__construct("meter", $text);
	}
}
