<?php

namespace Unicorn\UI\HTML;

use Unicorn\UI\Base\HtmlElement;
use Unicorn\UI\HTML\Attributes\Download;
use Unicorn\UI\HTML\Attributes\Media;
use Unicorn\UI\HTML\Attributes\OpenTarget;
use Unicorn\UI\HTML\Attributes\Relation;
use Unicorn\UI\HTML\Attributes\Target;
use Unicorn\UI\HTML\Attributes\TargetLanguage;
use Unicorn\UI\HTML\Attributes\Type;

class Link extends HtmlElement
{
	use Download;
	use Target;
	use OpenTarget;
	use TargetLanguage;
	use Relation;
	use Type;
	use Media;
	
	public function __construct(string $url = null)
	{
		parent::__construct("a");
		if($url !== null) {
			$this->setTarget($url);
		}
	}
}
