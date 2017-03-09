<?php

namespace Unicorn\Forms;

use Unicorn\UI\Base\Widget;

interface MultipleChoiceInputElement extends Widget
{
	public function setDefault(bool $default): void;
}
