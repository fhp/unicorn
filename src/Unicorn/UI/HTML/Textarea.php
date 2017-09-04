<?php

namespace Unicorn\UI\HTML;

class Textarea extends TextElement
{
	function __construct(string $content = null)
	{
		parent::__construct("title", $content);
	}
}
