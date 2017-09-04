<?php

namespace Unicorn\UI\HTML;

use Unicorn\UI\Base\ChildlessHtmlElement;

class LineBreak extends ChildlessHtmlElement
{
	function __construct()
	{
		parent::__construct("br");
		$this->noCloseTag();
	}
}
