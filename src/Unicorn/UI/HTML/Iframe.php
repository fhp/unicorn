<?php

namespace Unicorn\UI\HTML;

use Unicorn\UI\Base\HtmlElement;
use Unicorn\UI\HTML\Attributes\Height;
use Unicorn\UI\HTML\Attributes\Name;
use Unicorn\UI\HTML\Attributes\Sandbox;
use Unicorn\UI\HTML\Attributes\Source;
use Unicorn\UI\HTML\Attributes\SourceString;
use Unicorn\UI\HTML\Attributes\Width;

class Iframe extends HtmlElement
{
	use Source;
	use Height;
	use Width;
	use Name;
	use Sandbox;
	use SourceString;
	
	function __construct(string $src = null)
	{
		parent::__construct("iframe");
	}
}
