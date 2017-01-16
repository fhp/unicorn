<?php

namespace Unicorn\UI\Bootstrap;

class BadgeCounter extends Badge
{
	function __construct(int $count)
	{
		if($count == 0) {
			$content = "";
		} else {
			$content = "{$count}";
		}
		
		parent::__construct($content);
	}
}
