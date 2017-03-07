<?php

namespace Unicorn\UI\HTML;

use Unicorn\UI\Base\HtmlElement;

class Meta extends HtmlElement
{
	public function __construct($name, $content)
	{
		parent::__construct("meta");
		$this->setProperty("name", $name);
		$this->setProperty("content", $content);
	}
}
