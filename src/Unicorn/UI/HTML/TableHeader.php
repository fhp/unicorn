<?php

namespace Unicorn\UI\HTML;

use Unicorn\UI\HTML\Attributes\Abbr;
use Unicorn\UI\HTML\Attributes\Colspan;
use Unicorn\UI\HTML\Attributes\Headers;
use Unicorn\UI\HTML\Attributes\Rowspan;
use Unicorn\UI\HTML\Attributes\Scope;
use Unicorn\UI\HTML\Attributes\Sorted;

class TableHeader extends TableCell
{
	use Abbr;
	use Colspan;
	use Rowspan;
	use Headers;
	use Scope;
	use Sorted;
	
	function __construct(string $text = null)
	{
		parent::__construct("th", $text);
	}
}
