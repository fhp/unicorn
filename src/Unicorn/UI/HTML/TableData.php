<?php

namespace Unicorn\UI\HTML;

use Unicorn\UI\HTML\Attributes\Colspan;
use Unicorn\UI\HTML\Attributes\Headers;
use Unicorn\UI\HTML\Attributes\Rowspan;

class TableData extends TableCell
{
	use Colspan;
	use Rowspan;
	use Headers;
	
	function __construct(string $text = null)
	{
		parent::__construct("td", $text);
	}
}
