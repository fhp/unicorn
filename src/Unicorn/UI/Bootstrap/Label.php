<?php

namespace Unicorn\UI\Bootstrap;

use Unicorn\UI\Base\ChildlessHtmlWidget;

class Label extends ChildlessHtmlWidget
{
	function __construct(string $content, ContextualStyle $style = null)
	{
		parent::__construct("span");
		
		if($style === null) {
			$style = ContextualStyle::default();
		}
		
		$this->addClass("label");
		$this->addClass("label-$style");
		
		$this->getElement()->addText($content);
	}
}
