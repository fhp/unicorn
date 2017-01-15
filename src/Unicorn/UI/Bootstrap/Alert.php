<?php

namespace Unicorn\UI\Bootstrap;

use Unicorn\UI\Base\HTML;
use Unicorn\UI\Base\HtmlElement;
use Unicorn\UI\Base\ProtectedHtmlElement;
use Unicorn\UI\HTML\BoldText;

class Alert extends ProtectedHtmlElement
{
	function __construct(string $header, string $message, ContextualStyle $style)
	{
		parent::__construct("div");
		$this->addClass("alert");
		$this->addClass("alert-" . $style);
		$this->setRole("alert");
		
		$this->addChild(new BoldText($header));
		
		$this->addText(" " . $message);
	}
	
	public function dismissable()
	{
		$this->addClass("alert-dismissible");
		
		$closeButton = new Button();
		$closeButton->addClass("close");
		$closeButton->setData("dismiss", "alert");
		$closeButton->setAria("label", "Close");
		
		$span = new HtmlElement("span");
		$span->setAria("hidden", "true");
		$span->addChild(new HTML("&times;"));
		
		$closeButton->addChild($span);
		
		$this->prependChild($closeButton);
	}
	
}
