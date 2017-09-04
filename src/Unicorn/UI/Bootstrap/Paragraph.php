<?php

namespace Unicorn\UI\Bootstrap;

class Paragraph extends TextElement
{
	function __construct(string $text = null)
	{
		parent::__construct("p", $text);
	}
}
