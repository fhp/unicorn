<?php

namespace Unicorn\UI\HTML;

use Unicorn\UI\Base\HtmlElement;
use Unicorn\UI\HTML\Attributes\Disabled;
use Unicorn\UI\HTML\Attributes\Label;

class OptionGroup extends HtmlElement
{
	use Disabled;
	use Label;
	
	function __construct(string $label = null)
	{
		parent::__construct("optgroup");
		
		if($label !== null) {
			$this->setLabel($label);
		}
	}
	
	public function addOption(string $value, string $label)
	{
		$option = new Option($value, $label);
		$this->addChild($option);
		return $option;
	}
	
	public function addOptionGroup(string $label)
	{
		$optionGroup = new OptionGroup($label);
		$this->addChild($optionGroup);
		return $optionGroup;
	}
}
