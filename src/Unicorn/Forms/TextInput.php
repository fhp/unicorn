<?php

namespace Unicorn\Forms;

use Unicorn\Forms\Conditions\InputNotEmpty;
use Unicorn\UI\Base\Element;
use Unicorn\UI\HTML\Input as InputTag;

class TextInput extends SingleInput
{
	private $widget;
	
	function __construct(Input $parent, $id, $label = null, $name = null)
	{
		if($name === null) {
			$name = $id;
		}
		
		parent::__construct($parent, $name, $label);
		
		$this->widget = new InputTag("text");
		$this->widget->setName($this->fullName());
		$this->widget->setID($id);
	}
	
	public function widget(): Element
	{
		return $this->widget;
	}
	
	public function required(): void
	{
		$this->ensure(new InputNotEmpty($this));
	}
}
