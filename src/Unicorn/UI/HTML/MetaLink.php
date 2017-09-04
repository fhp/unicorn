<?php

namespace Unicorn\UI\HTML;

use Unicorn\UI\Base\ChildlessHtmlElement;
use Unicorn\UI\HTML\Attributes\CrossOrigin;
use Unicorn\UI\HTML\Attributes\Media;
use Unicorn\UI\HTML\Attributes\Relation;
use Unicorn\UI\HTML\Attributes\Sizes;
use Unicorn\UI\HTML\Attributes\Target;
use Unicorn\UI\HTML\Attributes\TargetLanguage;
use Unicorn\UI\HTML\Attributes\Type;

class MetaLink extends ChildlessHtmlElement
{
	use CrossOrigin;
	use Target;
	use TargetLanguage;
	use Media;
	use Relation;
	use Sizes;
	use Type;
	
	function __construct(string $relation = null, string $target = null, string $type = null)
	{
		parent::__construct("link");
		
		if($relation !== null) {
			$this->setRelation($relation);
		}
		
		if($target !== null) {
			$this->setTarget($target);
		}
		
		if($type !== null) {
			$this->setType($type);
		}
	}
}
