<?php

namespace Unicorn\UI\HTML;

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
}
