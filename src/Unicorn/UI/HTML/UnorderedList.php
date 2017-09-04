<?php

namespace Unicorn\UI\HTML;

use Unicorn\UI\Base\HtmlElementWidget;
use Unicorn\UI\Base\Widget;

class UnorderedList extends HtmlElementWidget
{
	function __construct()
	{
		parent::__construct("ul");
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
