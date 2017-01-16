<?php

namespace Unicorn\UI\Base;

use Unicorn\UI\Bootstrap\ContextualStyle;

abstract class TextElement extends HtmlElement
{
	function __construct(string $tag, string $text = null)
	{
		parent::__construct($tag);
		
		if($text !== null) {
			$this->addText($text);
		}
	}
	
	public function setContextualStyle(ContextualStyle $style): void
	{
		$this->addClass("text-" . $style);
	}
	
	public function setContextualBackgroundStyle(ContextualStyle $style): void
	{
		$this->addClass("bg-" . $style);
	}
}
