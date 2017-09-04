<?php

namespace Unicorn\UI\HTML;

use Unicorn\UI\Base\HtmlElement;

class Figure extends HtmlElement
{
	function __construct($imageSrc = null, $caption = null)
	{
		parent::__construct("figure");
		
		if($imageSrc !== null) {
			$this->addChild(new Image($imageSrc));
		}
		if($caption !== null) {
			$this->addChild(new Figcaption($caption));
		}
	}
}
