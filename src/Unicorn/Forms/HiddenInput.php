<?php

namespace Unicorn\Forms;

use Unicorn\UI\Base\Element;
use Unicorn\UI\HTML\Input as InputTag;

class HiddenInput extends SingleInput
{
	private $widget;
	
	function __construct(Input $parent, $id, $value, $name = null)
	{
		if($name === null) {
			$name = $id;
		}
		parent::__construct($parent, $name);
		
		$this->widget = new InputTag("hidden");
		$this->widget->setName($this->fullName());
		$this->widget->setID($id);
		$this->widget->setValue($value);
	}
	
	public function widget(): Element
	{
		return $this->widget;
	}
}
