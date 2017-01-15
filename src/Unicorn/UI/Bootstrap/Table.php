<?php

namespace Unicorn\UI\Bootstrap;

use Unicorn\UI\Base\HtmlElement;
use Unicorn\UI\Base\Stub;

class Table extends HtmlElement
{
	private $thead;
	private $tbody;
	private $tfoot;
	
	function __construct()
	{
		parent::__construct("table");
		$this->addClass("table");
		
		$this->thead = new Stub();
		$this->tbody = new Stub();
		$this->tfoot = new Stub();
	}
	
	public function striped(): void
	{
		$this->addClass("table-striped");
	}
	
	public function bordered(): void
	{
		$this->addClass("table-bordered");
	}
	
	public function hoverRows(): void
	{
		$this->addClass("table-hover");
	}
	
	public function condensed(): void
	{
		$this->addClass("table-condensed");
	}
	
	public function getHeader(): HtmlElement
	{
		if(!$this->thead->hasWidget()) {
			$header = new HtmlElement("thead");
			$this->thead->setWidget($header);
		}
		
		return $this->thead->getWidget();
	}
	
	public function getBody(): HtmlElement
	{
		
	}
}
