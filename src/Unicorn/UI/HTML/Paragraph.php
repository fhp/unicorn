<?php

namespace Unicorn\UI\HTML;
use Unicorn\UI\Base\HtmlElement;

class Paragraph extends HtmlElement
{
	function __construct(string $text = null)
	{
		parent::__construct("p");
		
		if($text !== null) {
			$this->addText($text);
		}
	}
}
