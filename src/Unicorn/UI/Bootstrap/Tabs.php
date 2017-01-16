<?php

namespace Unicorn\UI\Bootstrap;

use Unicorn\UI\Base\HtmlWidget;
use Unicorn\UI\Base\HtmlElement;
use Unicorn\UI\HTML\Link;

class Tabs extends HtmlWidget
{
	private $activeTabID;
	
	/** @var ITab[] */
	private $tabs = array();
	
	/** @var NavigationTabs */
	private $tabBar;
	
	/** @var HtmlElement */
	private $contents;
	
	public function __construct($activeTabID = null)
	{
		$this->activeTabID = $activeTabID;
		
		$this->tabBar = new NavigationTabs();
		
		$this->contents = new HtmlElement("div");
		$this->contents->addClass("tab-content");
		
		parent::__construct("div");
		
		$this->addChild($this->tabBar);
		$this->addChild($this->contents);
	}
	
	public function addTab(ITab $tab): void
	{
		$this->tabs[] = $tab;
		
		$this->tabBar->addItem($tab->getNavigationItem());
		$this->contents->addChild($tab->getContentPane());
	}
	
	private function setActiveTab(): void
	{
		/*
		 * First, determine if there is a form active
		 * Secondly, activate the tab specified by activeTabID if not null
		 * Lastly, activate the first tab.
		 */
		
		foreach($this->tabs as $tab) {
			if($tab->active()) {
				$tab->activate();
				return;
			}
		}
		
		if($this->activeTabID !== null) {
			foreach($this->tabs as $tab) {
				if($tab->getID() == $this->activeTabID) {
					$tab->activate();
					return;
				}
			}
		}
		
		foreach($this->tabs as $firstTab) {
			$firstTab->activate();
			return;
		}
	}
	
	public function render(): string
	{
		$this->setActiveTab();
		
		if($this->actionTabBar !== null) {
			$this->tabBar->addChild($this->actionTabBarMenu);
		}
		
		$html = parent::render();
		return $html;
	}
}
