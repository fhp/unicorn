<?php

namespace Unicorn\UI\HTML;

use Unicorn\UI\Base\HtmlElement;

class StylesheetSource extends HtmlElement
{
	function __construct($url)
	{
		parent::__construct("link");
		$this->setProperty("href", $url);
		$this->setProperty("type", "text/css");
		$this->setProperty("rel", "stylesheet");
		$this->noCloseTag();
	}
}
