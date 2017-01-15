<?php

namespace Unicorn\UI\Bootstrap;

use Unicorn\UI\Bootstrap\Icons\TrueIcon;
use Unicorn\UI\Bootstrap\Icons\FalseIcon;
use Unicorn\UI\Base\ProtectedWidgetList;

class BoolCheck extends ProtectedWidgetList
{
	function __construct(bool $bool, bool $longformat = true)
	{
		$icon = $bool ? new TrueIcon : new FalseIcon;
		$text = $bool ? "ja" : "nee";
		
		$this->addChild($icon);
		
		if($longformat) {
			$this->addText(" " . $text);
		} else {
			$icon->setAriaMeaning($text);
		}
	}
}
