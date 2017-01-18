<?php

namespace Unicorn\UI\Bootstrap;

use Unicorn\UI\Base\PanelWidget;
use Unicorn\UI\Base\Container;
use Unicorn\UI\HTML\Header;
use Unicorn\UI\HTML\Link;

class Tab extends PanelWidget implements ITab
{
	private $name;
	private $navItem;
	
	function __construct(string $id, string $name, bool $header = true)
	{
		parent::__construct("div");
		$this->setContainer($this->getElement());
		$content = $this->getElement();
		$content->setRole("tabpanel");
		$content->addClass("tab-pane");
		$content->setID($id);
		
		if($header) {
			$content->addChild(new Header($name));
		}
		
		$this->name = $name;
		
		$link = new Link("#" . $this->getID());
		$link->addText($this->getTabName());
		$link->setRole("tab");
		$link->setData("toggle", "tab");
		
		$this->navItem = new NavigationItem($link);
	}
	
	public function getContentPane(): Container
	{
		return $this->getContainer();
	}
	
	public function getNavigationItem(): NavigationItem
	{
		return $this->navItem;
	}
	
	public function getTabName(): string
	{
		return $this->name;
	}
	
	public function getID(): string
	{
		return parent::getID();
	}
	
	public function activate(): void
	{
		$this->getElement()->addClass("active");
		$this->getNavigationItem()->addClass("active");
	}
	
	public function active(): bool
	{
		return false;
	}
}
