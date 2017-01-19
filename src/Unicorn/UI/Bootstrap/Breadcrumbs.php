<?php

namespace Unicorn\UI\Bootstrap;

use Unicorn\UI\Base\ElementWidget;
use Unicorn\UI\Base\HtmlElement;
use Unicorn\UI\HTML\Link;

class Breadcrumbs extends ElementWidget
{
	private $activePage;
	private $pages = array();
	
	function __construct(string $activePage, bool $addHome = true)
	{
		parent::__construct("ol");
		$this->addClass("breadcrumb");
		
		$this->activePage = $activePage;
		
		if($addHome) {
			$this->addHomeBreadcrumb();
		}
	}
	
	protected function addHomeBreadcrumb()
	{
		$this->addBreadcrumb("Home", "/");
	}
	
	public function addBreadcrumb(string $name, string $url)
	{
		$this->pages[] = array("name"=>$name, "url"=>$url);
	}
	
	private function build(): void
	{
		foreach($this->pages as $page) {
			$link = new Link($page["url"]);
			$link->addText($page["name"]);
			
			$li = new HtmlElement("li");
			$li->addChild($link);
			
			$this->element()->addChild($li);
		}
		
		$li = new HtmlElement("li");
		$li->addClass("active");
		$li->addText($this->activePage);
		
		$this->element()->addChild($li);
	}
	
	public function render(): string
	{
		$this->build();
		return parent::render();
	}
}
