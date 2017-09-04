<?php

namespace Unicorn\UI\HTML;

use Unicorn\UI\Base\ChildlessHtmlElement;
use Unicorn\UI\HTML\Attributes\OpenTarget;
use Unicorn\UI\HTML\Attributes\Target;

class BaseUrl extends ChildlessHtmlElement
{
	use Target;
	use OpenTarget;
	
	function __construct()
	{
		parent::__construct("base");
	}
}
