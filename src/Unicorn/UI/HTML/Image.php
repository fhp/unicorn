<?php

namespace Unicorn\UI\HTML;
use Unicorn\UI\Base\ChildlessHtmlWidget;

class Image extends ChildlessHtmlWidget
{
	function __construct(string $src)
	{
		parent::__construct("img");
		$this->getElement()->noCloseTag();
		$this->getElement()->setProperty("src", $src);
	}
}
