<?php

namespace Unicorn\UI\HTML;

class Emphasize extends TextElement
{
	function __construct(string $text = null)
	{
		parent::__construct("em", $text);
	}
}
