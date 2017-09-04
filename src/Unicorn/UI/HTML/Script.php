<?php

namespace Unicorn\UI\HTML;

use Unicorn\UI\Base\HtmlElement;
use Unicorn\UI\HTML\Attributes\Async;
use Unicorn\UI\HTML\Attributes\Charset;
use Unicorn\UI\HTML\Attributes\Defer;
use Unicorn\UI\HTML\Attributes\Source;
use Unicorn\UI\HTML\Attributes\Type;

class Script extends HtmlElement
{
	use Async;
	use Charset;
	use Defer;
	use Source;
	use Type;
	
	function __construct()
	{
		parent::__construct("script");
	}
}
