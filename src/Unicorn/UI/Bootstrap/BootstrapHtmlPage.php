<?php

namespace Unicorn\UI\Bootstrap;

use Unicorn\UI\Base\HtmlElement;
use Unicorn\UI\Base\HtmlPage;
use Unicorn\UI\HTML\Meta;

class BootstrapHtmlPage extends HtmlPage
{
	function __construct(HtmlElement $content)
	{
		parent::__construct($content);
		
		$this->head()->addChild(new Meta("viewport", "width=device-width, initial-scale=1"));
		
		$this->addJavascript("https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js");
		$this->addJavascript("https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js");
		$this->addStylesheet("https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css");
	}
}
