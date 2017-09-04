<?php

namespace Unicorn\UI\HTML;

use Unicorn\UI\Base\HtmlElement;

class Abbreviation extends HtmlElement
{
	function __construct($title = null, $text = null)
	{
		parent::__construct("abbr");
		
		if($title !== null) {
			$this->setTitle($title);
		}
		if($text !== null) {
			$this->addText($text);
		}
	}
}
