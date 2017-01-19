<?php

namespace Unicorn\UI\HTML;

use Unicorn\UI\Base\PlainWidget;

class JavascriptSource extends PlainWidget
{
	function __construct($url)
	{
		parent::__construct("script");
		$this->element()->setProperty("src", $url);
	}
}
