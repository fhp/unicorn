<?php

namespace Unicorn\UI\Bootstrap;

use Unicorn\UI\Base\HtmlElement;

class Button extends HtmlElement
{
	function __construct(string $text = null, Icon $icon = null)
	{
		parent::__construct("button");
		$this->setProperty("type", "button");
		
		if($icon !== null) {
			$this->addChild($icon);
		}
		
		if($text !== null) {
			$this->addText($text);
		}
	}
}
