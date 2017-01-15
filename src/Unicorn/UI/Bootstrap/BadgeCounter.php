<?php

namespace Unicorn\UI\Bootstrap;

class BadgeCounter extends Badge
{
	function __construct(int $count)
	{
		parent::__construct((string)$count);
		
		if($count == 0) {
			$this->addClass("badge-success");
		}
	}
}
