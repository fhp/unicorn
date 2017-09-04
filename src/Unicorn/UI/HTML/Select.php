<?php

namespace Unicorn\UI\HTML;

use Unicorn\UI\Base\HtmlElement;
use Unicorn\UI\HTML\Attributes\Autofocus;
use Unicorn\UI\HTML\Attributes\Disabled;
use Unicorn\UI\HTML\Attributes\Form;
use Unicorn\UI\HTML\Attributes\Multiple;
use Unicorn\UI\HTML\Attributes\Name;
use Unicorn\UI\HTML\Attributes\Required;
use Unicorn\UI\HTML\Attributes\Size;

class Select extends HtmlElement
{
	use Name;
	use Form;
	use Size;
	use Autofocus;
	use Disabled;
	use Multiple;
	use Required;
	
	function __construct(string $name = null)
	{
		parent::__construct("select");
		
		if($name !== null) {
			$this->setName($name);
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
