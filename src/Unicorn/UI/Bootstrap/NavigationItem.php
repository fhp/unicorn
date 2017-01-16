<?php
namespace Unicorn\UI\Bootstrap;

use Unicorn\UI\Base\HtmlWidget;
use Unicorn\UI\HTML\Link;

class NavigationItem extends HtmlWidget
{
	public function __construct(Link $link)
	{
		parent::__construct("li");
		$this->getElement()->setRole("presentation");
		$this->getElement()->addChild($link);
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
