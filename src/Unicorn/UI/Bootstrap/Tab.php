<?php

namespace Unicorn\UI\Bootstrap;

use Unicorn\UI\Base\PanelWidget;
use Unicorn\UI\Base\Container;
use Unicorn\UI\HTML\Header;
use Unicorn\UI\HTML\Link;

class Tab extends PanelWidget implements ITab
{
	/** @var string */
	private $name;
	
	/** @var NavigationItem */
	private $navItem;
	
	function __construct(string $id, string $name, bool $header = true)
	{
		parent::__construct("div");
		$this->setContainer($this->element());
		$content = $this->element();
		$content->setRole("tabpanel");
		$content->addClass("tab-pane");
		$content->setID($id);
		
		if($header) {
			$content->addChild(new Header($name));
		}
		
		$this->name = $name;
		
		$link = new Link("#" . $this->id());
		$link->addText($this->tabName());
		$link->setRole("tab");
		$link->setData("toggle", "tab");
		
		$this->navItem = new NavigationItem($link);
	}
	
	public function contentPane(): Container
	{
		return $this->container();
	}
	
	public function navigationItem(): NavigationItem
	{
		return $this->navItem;
	}
	
	public function tabName(): string
	{
		return $this->name;
	}
	
	public function id(): string
	{
		return parent::id();
	}
	
	public function activate(): void
	{
		$this->element()->addClass("active");
		$this->navigationItem()->addClass("active");
	}
	
	public function isActive(): bool
	{
		return false;
	}
}
