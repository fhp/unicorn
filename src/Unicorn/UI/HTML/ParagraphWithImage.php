<?php

namespace Unicorn\UI\HTML;

use Unicorn\UI\Bootstrap\TextElement;

class ParagraphWithImage extends TextElement
{
	function __construct(Image $image, string $text = null, string $side = "left")
	{
		parent::__construct("p");
		
		$image->addClass("pull-{$side}");
		
		$this->addChild($image);
		if($text !== null) {
			$this->addText($text);
		}
	}
}
