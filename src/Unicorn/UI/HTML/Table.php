<?php

namespace Unicorn\UI\HTML;

use Unicorn\UI\Base\HtmlElementWidget;
use Unicorn\UI\Base\Stub;
use Unicorn\UI\HTML\Attributes\Sortable;

class Table extends HtmlElementWidget
{
	private $thead;
	private $tbody;
	private $tfoot;
	
	use Sortable;
	
	function __construct()
	{
		parent::__construct("table");
		
		$this->thead = new Stub();
		$this->tbody = new Stub();
		$this->tfoot = new Stub();
		
		$this->container()->addChild($this->thead);
		$this->container()->addChild($this->tbody);
		$this->container()->addChild($this->tfoot);
	}
	
	public function header(): TableHead
	{
		if(!$this->thead->hasWidget()) {
			$this->thead->setWidget(new TableHead());
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
