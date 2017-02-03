<?php

namespace Unicorn\UI\Bootstrap;

use Unicorn\UI\Base\ContainerWrapper;
use Unicorn\UI\Base\HtmlElement;
use Unicorn\UI\Base\Widget;
use Unicorn\UI\Base\WidgetContainer;

class Collapsible implements WidgetContainer, Widget
{
	use ContainerWrapper {
		ContainerWrapper::container as public;
	}
	
	private $button;
	
	function __construct(string $id, string $text = null, Icon $icon = null)
	{
		$this->button = new Button($text, $icon);
		$this->button->setData("toggle", "collapse");
		$this->button->setData("target", "#" . $id);
		
		$area = new HtmlElement("div");
		$area->setID($id);
		$area->addClass("collapse");
		
		$this->setContainer($area);
	}
	
	public function button(): Button
	{
		return $this->button;
	}
	
	public function render(): string
	{
		$html = "";
		$html .= $this->button()->render();
		$html .= $this->container()->render();
		return $html;
	}
	
	public function isActive(): bool
	{
		return $this->container()->isActive() || $this->button()->isActive();
	}
}
