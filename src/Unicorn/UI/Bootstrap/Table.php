<?php

namespace Unicorn\UI\Bootstrap;

use Unicorn\UI\HTML\Table as HtmlTable;

class Table extends HtmlTable
{
	public function __construct()
	{
		parent::__construct();
		$this->addClass("table");
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
}
