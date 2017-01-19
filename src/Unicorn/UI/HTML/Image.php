<?php

namespace Unicorn\UI\HTML;
use Unicorn\UI\Base\ElementWidget;

class Image extends ElementWidget
{
	function __construct(string $src)
	{
		parent::__construct("img");
		$this->element()->noCloseTag();
		$this->element()->setProperty("src", $src);
	}
}
