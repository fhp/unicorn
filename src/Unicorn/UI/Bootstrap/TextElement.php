<?php

namespace Unicorn\UI\Bootstrap;

use Unicorn\UI\Base\HtmlElement;

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
