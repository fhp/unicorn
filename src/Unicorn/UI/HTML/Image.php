<?php

namespace Unicorn\UI\HTML;
use Unicorn\UI\Base\ChildlessHtmlElement;
use Unicorn\UI\HTML\Attributes\AltText;
use Unicorn\UI\HTML\Attributes\CrossOrigin;
use Unicorn\UI\HTML\Attributes\Height;
use Unicorn\UI\HTML\Attributes\IsMap;
use Unicorn\UI\HTML\Attributes\LongDescription;
use Unicorn\UI\HTML\Attributes\Sizes;
use Unicorn\UI\HTML\Attributes\Source;
use Unicorn\UI\HTML\Attributes\SourceSet;
use Unicorn\UI\HTML\Attributes\Usemap;
use Unicorn\UI\HTML\Attributes\Width;

class Image extends ChildlessHtmlElement
{
	use AltText;
	use Height;
	use Width;
	use Source;
	use Usemap;
	use IsMap;
	use CrossOrigin;
	use LongDescription;
	use Sizes;
	use SourceSet;
	
	function __construct(string $src)
	{
		parent::__construct("img");
		$this->noCloseTag();
		
		$this->setSource($src);
	}
}
