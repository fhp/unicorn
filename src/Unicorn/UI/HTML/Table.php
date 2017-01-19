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
		
		$this->element()->addChild($this->thead);
		$this->element()->addChild($this->tbody);
		$this->element()->addChild($this->tfoot);
	}
	
	public function header(): TableHeader
	{
		if(!$this->thead->hasWidget()) {
			$this->thead->setWidget(new TableHeader());
		}
		
		return $this->thead->widget();
	}
	
	public function body(): TableBody
	{
		if(!$this->tbody->hasWidget()) {
			$this->tbody->setWidget(new TableBody());
		}
		
		return $this->tbody->widget();
	}
	
	public function footer(): TableFooter
	{
		if(!$this->tfoot->hasWidget()) {
			$this->tfoot->setWidget(new TableFooter());
		}
		
		return $this->tfoot->widget();
	}
	
	public function addColumn(string $header, iterable $data): void
	{
		$this->header()->addColumn($header);
		$this->body()->addColumn($data);
	}
}
