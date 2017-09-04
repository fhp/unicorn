<?php

namespace Unicorn\UI\HTML;

use Unicorn\UI\Base\HtmlElement;
use Unicorn\UI\HTML\Attributes\AcceptedCharset;
use Unicorn\UI\HTML\Attributes\Action;
use Unicorn\UI\HTML\Attributes\Autocomplete;
use Unicorn\UI\HTML\Attributes\Enctype;
use Unicorn\UI\HTML\Attributes\Method;
use Unicorn\UI\HTML\Attributes\Name;
use Unicorn\UI\HTML\Attributes\NoValidate;
use Unicorn\UI\HTML\Attributes\Target;

class Form extends HtmlElement
{
	use AcceptedCharset;
	use Action;
	use Autocomplete;
	use Enctype;
	use Method;
	use Name;
	use NoValidate;
	use Target;
	
	function __construct()
	{
		parent::__construct("form");
	}
}
