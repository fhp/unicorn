<?php

namespace Unicorn\UI\HTML;

use Unicorn\UI\HTML\Attributes\Autofocus;
use Unicorn\UI\HTML\Attributes\Disabled;
use Unicorn\UI\HTML\Attributes\Form;
use Unicorn\UI\HTML\Attributes\FormAction;
use Unicorn\UI\HTML\Attributes\FormEnctype;
use Unicorn\UI\HTML\Attributes\FormMethod;
use Unicorn\UI\HTML\Attributes\FormNoValidate;
use Unicorn\UI\HTML\Attributes\FormTarget;
use Unicorn\UI\HTML\Attributes\Name;
use Unicorn\UI\HTML\Attributes\Type;
use Unicorn\UI\HTML\Attributes\Value;

class Button extends TextElement
{
	use Autofocus;
	use Disabled;
	use Form;
	use FormAction;
	use FormEnctype;
	use FormMethod;
	use FormNoValidate;
	use FormTarget;
	use Name;
	use Type;
	use Value;
	
	function __construct(string $name = null, string $text = null)
	{
		parent::__construct("button", $text);
		
		if($name !== null) {
			$this->setName($name);
		}
	}
}
