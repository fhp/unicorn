<?php

namespace Unicorn\UI\HTML;

use Unicorn\UI\Base\TextElement;

class Link extends TextElement
{
	public function __construct(string $url)
	{
		parent::__construct("a");
		$this->setProperty("href", $url);
	}
}
