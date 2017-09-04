<?php

namespace Unicorn\UI\HTML;

use Unicorn\UI\Base\HtmlElement;
use Unicorn\UI\HTML\Attributes\Manifest;
use Unicorn\UI\HTML\Attributes\Xmlns;

class Html extends HtmlElement
{
	use Manifest;
	use Xmlns;
	
	function __construct()
	{
		parent::__construct("html");
	}
}
