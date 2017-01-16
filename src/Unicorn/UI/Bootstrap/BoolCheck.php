<?php

namespace Unicorn\UI\Bootstrap;

use Unicorn\UI\Base\ListWidget;
use Unicorn\UI\Bootstrap\Icons\TrueIcon;
use Unicorn\UI\Bootstrap\Icons\FalseIcon;

class BoolCheck extends ListWidget
{
	function __construct(bool $bool, bool $longformat = true)
	{
		parent::__construct();
		
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
