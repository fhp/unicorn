<?php

namespace Unicorn\UI\HTML;

use Unicorn\UI\Base\HtmlBlob;
use Unicorn\UI\Base\PlainWidget;

class JavascriptCode extends PlainWidget
{
	function __construct($code)
	{
		parent::__construct("script");
		$this->element()->addChild(new HtmlBlob($code));
	}
}
