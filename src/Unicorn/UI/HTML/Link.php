<?php

namespace Unicorn\UI\HTML;

use Unicorn\UI\Base\HtmlElement;

class Link extends HtmlElement
{
	public function __construct(string $url)
	{
		parent::__construct("a");
		$this->setProperty("href", $url);
	}
}
