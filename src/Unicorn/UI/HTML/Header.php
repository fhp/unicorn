<?php

namespace Unicorn\UI\HTML;

class Header extends TextElement
{
	function __construct($header, $size = "h2", $subtext = null)
	{
		if((preg_match("/h[1-6]/", $size) === 0)) {
			throw new \InvalidArgumentException("Invalid size given, use h1-h6");
		}
		
		parent::__construct($size, $header);
		
		if($subtext !== null) {
			$this->addText(" ");
			$this->addChild(new Small($subtext));
		}
	}
}
