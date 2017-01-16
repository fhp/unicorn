<?php

namespace Unicorn\UI\HTML;

use Unicorn\UI\Base\HtmlWidget;
use Unicorn\UI\Base\Stub;

class Table extends HtmlWidget
{
	private $thead;
	private $tbody;
	private $tfoot;
	
	function __construct()
	{
		parent::__construct("table");
		
		$this->thead = new Stub();
		$this->tbody = new Stub();
		$this->tfoot = new Stub();
		
		$this->addChild($this->thead);
		$this->addChild($this->tbody);
		$this->addChild($this->tfoot);
	}
	
	public function getHeader(): TablePart
	{
		if(!$this->thead->hasWidget()) {
			$header = new TableHeader();
			$this->thead->setWidget($header);
		}
		
		return $this->thead->getWidget();
	}
	
	public function getBody(): TablePart
	{
		if(!$this->tbody->hasWidget()) {
			$body = new TableBody();
			$this->tbody->setWidget($body);
		}
		
		return $this->tbody->getWidget();
	}
	
	public function getFooter(): TablePart
	{
		if(!$this->tfoot->hasWidget()) {
			$footer = new TableFooter();
			$this->tfoot->setWidget($footer);
		}
		
		return $this->tfoot->getWidget();
	}
}

