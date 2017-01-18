<?php

namespace Unicorn\UI\HTML;

use Unicorn\UI\Base\ElementWidget;
use Unicorn\UI\Base\Stub;

class Table extends ElementWidget
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
		
		$this->getElement()->addChild($this->thead);
		$this->getElement()->addChild($this->tbody);
		$this->getElement()->addChild($this->tfoot);
	}
	
	public function getHeader(): TableHeader
	{
		if(!$this->thead->hasWidget()) {
			$this->thead->setWidget(new TableHeader());
		}
		
		return $this->thead->getWidget();
	}
	
	public function getBody(): TableBody
	{
		if(!$this->tbody->hasWidget()) {
			$this->tbody->setWidget(new TableBody());
		}
		
		return $this->tbody->getWidget();
	}
	
	public function getFooter(): TableFooter
	{
		if(!$this->tfoot->hasWidget()) {
			$this->tfoot->setWidget(new TableFooter());
		}
		
		return $this->tfoot->getWidget();
	}
	
	public function addColumn(string $header, iterable $data): void
	{
		$this->getHeader()->addColumn($header);
		$this->getBody()->addColumn($data);
	}
}
