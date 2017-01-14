<?php

namespace Unicorn\UI\Bootstrap;
use Unicorn\UI\Base\ProtectedHtmlElement;

class BadgeCounter extends ProtectedHtmlElement
{
	function __construct(int $count)
	{
		parent::__construct("span");
		$this->addClass("badge");
		if($count == 0) {
			$this->addClass("badge-success");
		}
		$this->addText($count);
	}
}
