<?php

namespace Unicorn\UI\HTML;

use Unicorn\UI\Base\HtmlElement;

class BoldText extends HtmlElement
{
	function __construct(string $text)
	{
		parent::__construct("b");
		
		$this->addText($text);
	}
}
