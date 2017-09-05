<?php

require_once "vendor/autoload.php";
require_once "test-common.php";

class TestPage2 extends TestPageLayout
{
	function __construct()
	{
		parent::__construct();
		
		$this->setTitle("appel");
		
		$form = new \Unicorn\Forms\Test\TestForm("test");
		$renderer = new \Unicorn\Forms\Test\TestRenderer($form);
		
		$this->addChild($renderer);
	}
}

echo (new TestPage2())->render();
