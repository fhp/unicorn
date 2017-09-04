<?php

namespace Unicorn\UI\Bootstrap;

use Unicorn\UI\Base\HtmlElement;

abstract class TextElement extends HtmlElement
{
	use HasContextualStyle;
	
	function __construct(string $tag, string $text = null)
	{
		parent::__construct($tag);
		
		if($text !== null) {
			$this->addText($text);
		}
	}
}
