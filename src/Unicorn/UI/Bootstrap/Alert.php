<?php

namespace Unicorn\UI\Bootstrap;

use Unicorn\UI\Base\HtmlBlob;
use Unicorn\UI\Base\HtmlElement;
use Unicorn\UI\Base\ElementWidget;
use Unicorn\UI\HTML\Bold;

class Alert extends ElementWidget
{
	function __construct(string $header, string $message, ContextualStyle $style)
	{
		parent::__construct("div");
		$alert = $this->element();
		
		$alert->addClass("alert");
		$alert->addClass("alert-" . $style);
		$alert->setRole("alert");
		
		$alert->addChild(new Bold($header));
		
		$alert->addText(" " . $message);
	}
	
	public function dismissable()
	{
		$alert = $this->element();
		
		$alert->addClass("alert-dismissible");
		
		$closeButton = new Button();
		$closeButton->addClass("close");
		$closeButton->setData("dismiss", "alert");
		$closeButton->setAria("label", "Close");
		
		$span = new HtmlElement("span");
		$span->setAria("hidden", "true");
		$span->addChild(new HtmlBlob("&times;"));
		
		$closeButton->addChild($span);
		
		$alert->prependChild($closeButton);
	}
}
