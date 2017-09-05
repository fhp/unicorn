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
		
		$this->addJavascript("https://code.jquery.com/jquery-3.2.1.slim.min.js");
		$this->addJavascript("https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js");
		$this->addJavascript("https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js");
		$this->addStylesheet("https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css");
	}
}
