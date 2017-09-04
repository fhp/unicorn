<?php

namespace Unicorn\UI\HTML;

use Unicorn\UI\Base\ChildlessHtmlElement;

class WordBreak extends ChildlessHtmlElement
{
	function __construct()
	{
		parent::__construct("wbr");
		$this->noCloseTag();
	}
}
