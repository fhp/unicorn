<?php

namespace Unicorn\UI\HTML;

use Unicorn\UI\Base\HtmlElement;

class JavascriptSource extends HtmlElement
{
	function __construct($url)
	{
		parent::__construct("script");
		$this->setProperty("src", $url);
	}
}
