<?php

namespace Unicorn\UI\Bootstrap;

use Unicorn\UI\Base\ElementWidget;

class Label extends ElementWidget
{
	function __construct(string $content, ContextualStyle $style = null)
	{
		parent::__construct("span");
		
		if($style === null) {
			$style = ContextualStyle::default();
		}
		
		$this->addClass("label");
		$this->addClass("label-$style");
		
		$this->element()->addText($content);
	}
}
