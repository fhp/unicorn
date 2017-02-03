<?php

namespace Unicorn\UI\Bootstrap;

use Unicorn\UI\Base\HtmlElement;
use Unicorn\UI\Base\ListWidget;
use Unicorn\UI\Base\Text;
use Unicorn\UI\Base\Widget;
use Unicorn\UI\Bootstrap\Icons\ListAltIcon;

class HtmlDebugger extends ListWidget
{
	function __construct(string $id, Widget $widget)
	{
		parent::__construct();
		$this->container()->addChild($widget);
		
		$pre = new HtmlElement("pre");
		$pre->addChild(new Text($widget->render()));
		
		$collapsable = new Collapsible($id, "Show HTML", new ListAltIcon);
		$collapsable->addChild($pre);
		
		$this->container()->addChild($collapsable);
	}
}
