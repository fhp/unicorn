<?php

namespace Unicorn\UI\Util;

use Unicorn\UI\Base\PlainWidget;
use Unicorn\UI\HTML\Script;

class JavascriptSource extends PlainWidget
{
	function __construct($url)
	{
		$script = new Script();
		$script->setSource($url);
		
		parent::__construct($script);
	}
}
