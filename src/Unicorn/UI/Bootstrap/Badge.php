<?php

namespace Unicorn\UI\Bootstrap;

use Unicorn\UI\Base\HtmlElement;

class Badge extends HtmlElement
{
	function __construct(string $content = null)
	{
		parent::__construct("span");
		$this->addClass("badge");
		
		if($content !== null) {
			$this->addText($content);
		}
	}
}
