<?php
namespace Unicorn\UI\Bootstrap;

use Unicorn\UI\Base\PanelWidget;
use Unicorn\UI\HTML\Link;

class NavigationItem extends PanelWidget
{
	public function __construct(Link $link)
	{
		parent::__construct("li");
		$this->element()->setRole("presentation");
		$this->element()->addChild($link);
	}
	
	static public function fromNameAndUrl($label, $url, $count = null)
	{
		$link = new Link($url);
		$link->addText($label);
		
		if($count !== null) {
			$link->addChild(new BadgeCounter($count));
		}
		
		return new static($link);
	}
	
	public function active(): void
	{
		$this->addClass("active");
	}
	
	public function disabled(): void
	{
		$this->addClass("disabled");
	}
}
