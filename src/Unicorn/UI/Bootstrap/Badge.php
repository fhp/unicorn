<?php

namespace Unicorn\UI\Bootstrap;

use Unicorn\UI\Base\ChildlessHtmlWidget;

class Badge extends ChildlessHtmlWidget
{
	function __construct(string $content)
	{
		parent::__construct("span");
		$this->addClass("badge");
		
		$this->getElement()->addText($content);
	}
}
