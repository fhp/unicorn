<?php

namespace Unicorn\UI\HTML;
use Unicorn\UI\Base\ElementWidget;

class Image extends ElementWidget
{
	function __construct(string $src)
	{
		parent::__construct("img");
		$this->getElement()->noCloseTag();
		$this->getElement()->setProperty("src", $src);
	}
}
