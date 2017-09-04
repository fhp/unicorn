<?php

namespace Unicorn\UI\HTML;

use Unicorn\UI\Base\HtmlElement;
use Unicorn\UI\HTML\Attributes\Autofocus;
use Unicorn\UI\HTML\Attributes\Challenge;
use Unicorn\UI\HTML\Attributes\Disabled;
use Unicorn\UI\HTML\Attributes\Form;
use Unicorn\UI\HTML\Attributes\KeyType;
use Unicorn\UI\HTML\Attributes\Name;

class Keygen extends HtmlElement
{
	use Form;
	use KeyType;
	use Name;
	use Autofocus;
	use Challenge;
	use Disabled;
	
	function __construct(string $name = null)
	{
		parent::__construct("keygen");
		
		if($name !== null) {
			$this->setName($name);
		}
	}
}
