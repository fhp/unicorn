<?php

namespace Unicorn\UI\Bootstrap;

use Unicorn\UI\Base\HtmlElement;
use Unicorn\UI\Base\ProtectedWidgetList;

abstract class Icon extends ProtectedWidgetList
{
	/** @var HtmlElement */
	private $icon;
	
	/** @var HtmlElement */
	private $airaSpan = null;
	
	public function __construct(string $color = null, string $ariaMeaning = null)
	{
		$this->icon = new HtmlElement("span");
		$this->icon->addClass("glyphicon");
		$this->icon->addClass("glyphicon-" . $this->icon());
		$this->icon->setAria("hidden", "true");
		
		if($color !== null) {
			$this->setColor($color);
		} else if($this->color() !== null) {
			$this->setColor($this->color());
		}
		
		$this->addChild($this->icon);
		
		if($ariaMeaning !== null) {
			$this->setAriaMeaning($ariaMeaning);
		}
	}
	
	abstract protected function icon(): string;
	
	protected function color(): ?string
	{
		return null;
	}
	
	public function setColor(string $color): void
	{
		$this->icon->setProperty("style", "color: $color;");
	}
	
	public function setAriaMeaning(string $meaning)
	{
		if($this->airaSpan === null) {
			$this->airaSpan = new HtmlElement("span");
			$this->airaSpan->addClass("sr-only");
		} else {
			$this->airaSpan->removeChildren();
		}
		$this->airaSpan->addText($meaning);
		
		$this->addChild($this->airaSpan);
	}
	
	public function render(): string
	{
		return " " . parent::render() . " ";
	}
}
