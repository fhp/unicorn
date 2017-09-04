<?php

namespace Unicorn\UI\Bootstrap\Forms;

use PHPUnit\Framework\TestCase;
use Unicorn\UI\Base\TestHasNoChildren;
use Unicorn\UI\Base\TestIsElement;

class FormTest extends TestCase
{
	use TestHasNoChildren;
	use TestIsElement;
	
	function constructTestObject()
	{
		return new Form("testForm", "test.php");
	}
}
