<?php

namespace Unicorn\UI\HTML;

use Unicorn\UI\Base\HtmlElement;
use Unicorn\UI\HTML\Attributes\Height;
use Unicorn\UI\HTML\Attributes\Source;
use Unicorn\UI\HTML\Attributes\Type;
use Unicorn\UI\HTML\Attributes\Width;

class Embed extends HtmlElement
{
	use Source;
	use Height;
	use Width;
	use Type;
	
	function __construct()
	{
		parent::__construct("embed");
	}
}
