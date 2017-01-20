<?php

namespace Unicorn\UI\Bootstrap;

use Unicorn\UI\Base\HtmlElement;

class Button extends HtmlElement
{
	function __construct(string $text = null, Icon $icon = null, ContextualStyle $style = null)
	{
		if($style === null) {
			$style = ContextualStyle::default();
		}
		
		parent::__construct("button");
		$this->setProperty("type", "button");
		$this->addClass("btn");
		$this->addClass("btn-" . $style);
		
		if($icon !== null) {
			$this->addChild($icon);
		}
		
		if($text !== null) {
			$this->addText($text);
		}
	}
}
