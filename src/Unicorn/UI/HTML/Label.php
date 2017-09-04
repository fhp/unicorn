<?php

namespace Unicorn\UI\HTML;

use Unicorn\UI\HTML\Attributes\ForElement;
use Unicorn\UI\HTML\Attributes\Form;

class Label extends TextElement
{
	use ForElement;
	use Form;
	
	function __construct(string $for = null, $text = null)
	{
		parent::__construct("label", $text);
		
		if($for !== null) {
			$this->setFor($for);
		}
	}
}
