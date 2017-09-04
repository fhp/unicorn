<?php

namespace Unicorn\UI\HTML;

use Unicorn\UI\Base\ChildlessHtmlElement;

class HorizontalRule extends ChildlessHtmlElement
{
	function __construct()
	{
		parent::__construct("hr");
		$this->noCloseTag();
	}
}
