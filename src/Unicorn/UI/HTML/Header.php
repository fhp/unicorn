<?php

namespace Unicorn\UI\HTML;

use Unicorn\UI\Base\HtmlElement;

class Header extends HtmlElement
{
	function __construct($header, $size = "h2", $subtext = null)
	{
		if((preg_match("/h[1-6]/", $size) === 0)) {
			throw new \InvalidArgumentException("Invalid size given, use h1-h6");
		}
		
		parent::__construct($size);
		$this->addText($header);
		
		if($subtext !== null) {
			$this->addText(" ");
			$sub = new HtmlElement("small");
			$sub->addText($subtext);
			$this->addChild($sub);
		}
	}
}
