<?php

namespace Unicorn\UI\Bootstrap;

class LinkButton extends Button
{
	function __construct(string $url, string $text = null, Icon $icon = null, ContextualStyle $style = null)
	{
		parent::__construct($text, $icon, $style, "a");
		$this->setProperty("href", $url);
	}
}
