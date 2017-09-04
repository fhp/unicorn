<?php

namespace Unicorn\UI\HTML;

use Unicorn\UI\Base\HtmlElement;

class Bdo extends HtmlElement
{
	function __construct($dir)
	{
		parent::__construct("bdo");
		
		$this->setTextDirection($dir);
	}
}
