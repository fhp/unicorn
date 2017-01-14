<?php

namespace Unicorn\UI\Bootstrap\Icons;

use Unicorn\UI\Bootstrap\Icon;

class FalseIcon extends Icon {
	protected function icon(): string
	{
		return "remove";
	}
	
	protected function color(): string
	{
		return "red";
	}
}
