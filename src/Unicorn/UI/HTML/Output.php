<?php

namespace Unicorn\UI\HTML;

use Unicorn\UI\Base\HtmlElement;
use Unicorn\UI\HTML\Attributes\ForElement;
use Unicorn\UI\HTML\Attributes\Form;
use Unicorn\UI\HTML\Attributes\Name;

class Output extends HtmlElement
{
	use ForElement;
	use Form;
	use Name;
	
	function __construct(string $name = null)
	{
		parent::__construct("output");
		
		if($name !== null) {
			$this->setName($name);
		}
	}
}
