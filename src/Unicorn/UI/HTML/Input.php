<?php

namespace Unicorn\UI\HTML;

use Unicorn\UI\Base\ChildlessHtmlElement;
use Unicorn\UI\HTML\Attributes\Accept;
use Unicorn\UI\HTML\Attributes\AltText;
use Unicorn\UI\HTML\Attributes\Autocomplete;
use Unicorn\UI\HTML\Attributes\Autofocus;
use Unicorn\UI\HTML\Attributes\Checked;
use Unicorn\UI\HTML\Attributes\DataList;
use Unicorn\UI\HTML\Attributes\Dirname;
use Unicorn\UI\HTML\Attributes\Disabled;
use Unicorn\UI\HTML\Attributes\Form;
use Unicorn\UI\HTML\Attributes\FormAction;
use Unicorn\UI\HTML\Attributes\FormEnctype;
use Unicorn\UI\HTML\Attributes\FormMethod;
use Unicorn\UI\HTML\Attributes\FormNoValidate;
use Unicorn\UI\HTML\Attributes\FormTarget;
use Unicorn\UI\HTML\Attributes\Height;
use Unicorn\UI\HTML\Attributes\Max;
use Unicorn\UI\HTML\Attributes\MaxLength;
use Unicorn\UI\HTML\Attributes\Min;
use Unicorn\UI\HTML\Attributes\Multiple;
use Unicorn\UI\HTML\Attributes\Name;
use Unicorn\UI\HTML\Attributes\Pattern;
use Unicorn\UI\HTML\Attributes\Placeholder;
use Unicorn\UI\HTML\Attributes\ReadOnly;
use Unicorn\UI\HTML\Attributes\Required;
use Unicorn\UI\HTML\Attributes\Size;
use Unicorn\UI\HTML\Attributes\Source;
use Unicorn\UI\HTML\Attributes\Step;
use Unicorn\UI\HTML\Attributes\Type;
use Unicorn\UI\HTML\Attributes\Value;
use Unicorn\UI\HTML\Attributes\Width;

// TODO: split to separate inputs based on type, with only applicable parameters

class Input extends ChildlessHtmlElement
{
	use Accept;
	use AltText;
	use Autocomplete;
	use Autofocus;
	use Checked;
	use Dirname;
	use Disabled;
	use Form;
	use FormAction;
	use FormEnctype;
	use FormMethod;
	use FormNoValidate;
	use FormTarget;
	use Width;
	use Height;
	use DataList;
	use Max;
	use Min;
	use MaxLength;
	use Multiple;
	use Name;
	use Pattern;
	use Placeholder;
	use ReadOnly;
	use Required;
	use Size;
	use Source;
	use Step;
	use Type;
	use Value;
	
	function __construct(string $type = null, string $name = null)
	{
		parent::__construct("input");
		$this->noCloseTag();
		
		if($type !== null) {
			$this->setType($type);
		}
		
		if($name !== null) {
			$this->setName($name);
		}
	}
}
