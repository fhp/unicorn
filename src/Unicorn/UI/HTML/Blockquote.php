<?php

namespace Unicorn\UI\HTML;

use Unicorn\UI\HTML\Attributes\Cite;

class Blockquote extends TextElement
{
	use Cite;
	
	function __construct(string $cite = null, string $text = null)
	{
		parent::__construct("blockquote", $text);
		if($cite !== null) {
			$this->setCite($cite);
		}
	}
}
