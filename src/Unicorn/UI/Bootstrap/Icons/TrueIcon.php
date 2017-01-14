<?php

namespace Unicorn\UI\Bootstrap\Icons;

use Unicorn\UI\Bootstrap\Icon;

class TrueIcon extends Icon {
	protected function icon(): string
	{
		return "ok";
	}
	
	protected function color(): string
	{
		return "green";
	}
}
