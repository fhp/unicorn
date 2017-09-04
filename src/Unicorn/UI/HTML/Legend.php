<?php

namespace Unicorn\UI\HTML;

class Legend extends TextElement
{
	public function __construct(string $text = null)
	{
		parent::__construct("legend", $text);
	}
}
