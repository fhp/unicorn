<?php

namespace Unicorn\UI\HTML;

use Unicorn\UI\Base\HtmlElement;
use Unicorn\UI\HTML\Attributes\Charset;
use Unicorn\UI\HTML\Attributes\Content;
use Unicorn\UI\HTML\Attributes\HttpEquiv;
use Unicorn\UI\HTML\Attributes\Name;

class Meta extends HtmlElement
{
	use Charset;
	use Content;
	use HttpEquiv;
	use Name;
	
	public function __construct($name = null, $content = null)
	{
		parent::__construct("meta");
		
		if($name !== null) {
			$this->setName($name);
		}
		if($content !== null) {
			$this->setContent($content);
		}
	}
}
