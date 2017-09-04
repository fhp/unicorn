<?php

namespace Unicorn\UI\Bootstrap;

use Unicorn\UI\Base\HtmlElement;
use Unicorn\UI\Base\ListWidget;
use Unicorn\UI\HTML\Span;

abstract class Icon extends ListWidget
{
	/** @var Span */
	private $icon;
	
	/** @var HtmlElement */
	private $airaSpan = null;
	
	public function __construct(string $color = null, string $ariaMeaning = null)
	{
		parent::__construct();
		
		$this->icon = new Span();
		$this->icon->addClass("glyphicon");
		$this->icon->addClass("glyphicon-" . $this->icon());
		$this->icon->setAria("hidden", "true");
		
		if($color !== null) {
			$this->setColor($color);
		} else if($this->color() !== null) {
			$this->setColor($this->color());
		}
		
		$this->container()->addChild($this->icon);
		
		if($ariaMeaning !== null) {
			$this->setAriaMeaning($ariaMeaning);
		}
	}
	
	abstract protected function icon(): string;
	
	/**
	 * @return null|string Return the color, or null to not specify a color.
	 */
	protected function color()
	{
		return null;
	}
	
	public function setColor(string $color): void
	{
		$this->icon->addStyle("color: $color;");
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
		
		$this->container()->addChild($this->airaSpan);
	}
	
	public function render(): string
	{
		return " " . parent::render() . " ";
	}
}
