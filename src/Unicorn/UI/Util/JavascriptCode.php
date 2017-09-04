<?php

namespace Unicorn\UI\Util;

use Unicorn\UI\Base\HtmlBlob;
use Unicorn\UI\Base\PlainWidget;
use Unicorn\UI\HTML\Script;

/**
 * @inherits PlainWidget<Script>
 */
class JavascriptCode extends PlainWidget
{
	function __construct(string $code)
	{
		$script = new Script();
		$script->addChild(new HtmlBlob($code));
		
		parent::__construct($script);
	}
}
