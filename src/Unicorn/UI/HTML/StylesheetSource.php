<?php

namespace Unicorn\UI\HTML;

use Unicorn\UI\Base\PlainWidget;

class StylesheetSource extends PlainWidget
{
	function __construct($url)
	{
		parent::__construct("link");
		$link = $this->element();
		$link->setProperty("href", $url);
		$link->setProperty("type", "text/css");
		$link->setProperty("rel", "stylesheet");
		$link->noCloseTag();
	}
}
