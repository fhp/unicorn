<?php

namespace Unicorn\UI\Bootstrap;

use Unicorn\UI\Base\ElementWidget;

class Badge extends ElementWidget
{
	function __construct(string $content)
	{
		parent::__construct("span");
		$this->addClass("badge");
		
		$this->getElement()->addText($content);
	}
}
