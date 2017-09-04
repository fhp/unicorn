<?php

namespace Unicorn\UI\HTML;

use Unicorn\UI\Base\HtmlElement;
use Unicorn\UI\HTML\Attributes\Disabled;
use Unicorn\UI\HTML\Attributes\Form;
use Unicorn\UI\HTML\Attributes\Name;

class Fieldset extends HtmlElement
{
	use Form;
	use Name;
	use Disabled;
	
	function __construct(string $legend = null)
	{
		parent::__construct("fieldset");
		
		if($legend !== null) {
			$this->addChild(new Legend($legend));
		}
	}
}
