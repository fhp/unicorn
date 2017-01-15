<?php

namespace Unicorn\UI\HTML;
use Unicorn\UI\Base\ChildlessHtmlElement;

class Image extends ChildlessHtmlElement
{
	function __construct(string $src)
	{
		parent::__construct("img");
		$this->setProperty("src", $src);
	}
}
