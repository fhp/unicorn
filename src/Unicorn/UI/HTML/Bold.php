<?php

namespace Unicorn\UI\HTML;

class Bold extends TextElement
{
	function __construct(string $text = null)
	{
		parent::__construct("b", $text);
	}
}
