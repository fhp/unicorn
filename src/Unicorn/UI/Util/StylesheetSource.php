<?php

namespace Unicorn\UI\Util;

use Unicorn\UI\Base\PlainWidget;
use Unicorn\UI\HTML\MetaLink;

class StylesheetSource extends PlainWidget
{
	function __construct(string $url)
	{
		parent::__construct(new MetaLink("stylesheet", $url, "text/css"));
	}
}
