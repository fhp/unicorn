<?php

namespace Unicorn\UI\HTML;

use Unicorn\UI\Base\HtmlElement;

class Datalist extends HtmlElement
{
	function __construct(string $id = null)
	{
		parent::__construct("datalist");
		
		if($id !== null) {
			$this->setID($id);
		}
	}
	
	public function addOption($value)
	{
		$this->addChild(new Option($value));
	}
}
