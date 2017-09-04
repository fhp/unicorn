<?php

namespace Unicorn\UI\HTML;

class Definition extends TextElement
{
	function __construct($title = null, $text = null)
	{
		parent::__construct("dfn", $text);
		
		if($title !== null) {
			$this->setTitle($title);
		}
	}
}
