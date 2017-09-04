<?php

namespace Unicorn\UI\HTML;

use Unicorn\UI\HTML\Attributes\Media;
use Unicorn\UI\HTML\Attributes\Scoped;
use Unicorn\UI\HTML\Attributes\Type;

class Style extends TextElement
{
	use Media;
	use Type;
	use Scoped;
	
	function __construct($text = null)
	{
		parent::__construct("style", $text);
	}
}
