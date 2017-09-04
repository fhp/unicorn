<?php

namespace Unicorn\UI\HTML;

use Unicorn\UI\Base\HtmlElement;
use Unicorn\UI\HTML\Attributes\DataUrl;
use Unicorn\UI\HTML\Attributes\Form;
use Unicorn\UI\HTML\Attributes\Height;
use Unicorn\UI\HTML\Attributes\Name;
use Unicorn\UI\HTML\Attributes\Type;
use Unicorn\UI\HTML\Attributes\Usemap;
use Unicorn\UI\HTML\Attributes\Width;

class Object extends HtmlElement
{
	use DataUrl;
	use Form;
	use Height;
	use Width;
	use Name;
	use Type;
	use Usemap;
	
	function __construct()
	{
		parent::__construct("object");
	}
}
