<?php

namespace Unicorn\UI\HTML;

use Unicorn\UI\HTML\Attributes\Height;
use Unicorn\UI\HTML\Attributes\Width;

class Canvas extends TextElement
{
	use Width;
	use Height;
	
	function __construct($id = null, $text = null)
	{
		parent::__construct("canvas", $text);
		if($id !== null) {
			$this->setID($id);
		}
	}
}
