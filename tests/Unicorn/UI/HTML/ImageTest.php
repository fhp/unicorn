<?php

namespace Unicorn\UI\HTML;

use PHPUnit\Framework\TestCase;
use Unicorn\UI\Base\TestIsElement;
use Unicorn\UI\Base\TestHasNoChildren;

class ImageTest extends TestCase
{
	use TestIsElement;
	use TestHasNoChildren;
	
	function constructTestObject()
	{
		return new Image("image.jpg");
	}
	
	function testIsImage()
	{
		$img = new Image("image.jpg");
		$this->assertRegExp("/^<img[^>]*src=\"image.jpg\"[^>]*>$/", $img->render());
	}
}
