<?php

namespace Unicorn\UI\HTML;

use Unicorn\UI\Base\HtmlElementWidget;
use Unicorn\UI\Base\Widget;
use Unicorn\UI\HTML\Attributes\Reversed;
use Unicorn\UI\HTML\Attributes\Start;
use Unicorn\UI\HTML\Attributes\Type;

class OrderedList extends HtmlElementWidget
{
	use Reversed;
	use Start;
	use Type;
	
	function __construct()
	{
		parent::__construct("ol");
	}
	
	/**
	 * @param string|Widget|ListItem $content
	 * @return ListItem
	 */
	function addItem($content): ListItem
	{
		if(is_a($content, "ListItem")) {
			$item = $content;
		} else {
			$item = new ListItem();
			if(is_string($content)) {
				$item->addText($content);
			} else {
				$item->addChild($content);
			}
		}
		$this->container()->addChild($item);
		return $item;
	}
}
