<?php

namespace Unicorn\UI\Bootstrap;

use Unicorn\UI\Base\Container;
use Unicorn\UI\Base\ElementWrapper;
use Unicorn\UI\Base\HtmlBlob;
use Unicorn\UI\Base\HtmlElement;
use Unicorn\UI\Base\Stub;
use Unicorn\UI\Base\Widget;
use Unicorn\UI\Base\WidgetContainer;
use Unicorn\UI\HTML\Header;
use Unicorn\UI\HTML\JavascriptCode;

class Modal extends Container implements WidgetContainer
{
	use ElementWrapper;
	
	/** @var Stub */
	private $header;
	
	/** @var HtmlElement */
	private $body;
	
	/** @var Stub */
	private $footer;
	
	/** @var Stub */
	private $title;
	
	public function __construct(string $id)
	{
		$this->setElement("div");
		parent::addChild($this->element());
		
		$this->setID($id);
		
		$this->addClass("modal");
		$this->addClass("fade");
		$this->element()->setRole("dialog");
		$this->element()->setTabindex(-1);
		
		$dialog = new HtmlElement("div");
		$dialog->addClass("modal-dialog");
		$dialog->setRole("document");
		$this->element()->addChild($dialog);
		
		$content = new HtmlElement("div");
		$content->addClass("modal-content");
		$dialog->addChild($content);
		
		$this->header = new Stub();
		$content->addChild($this->header);
		
		$this->body = new HtmlElement("div");
		$this->body->addClass("modal-body");
		$content->addChild($this->body);
		
		$this->footer = new Stub();
		$content->addChild($this->footer);
	}
	
	public function toggleButton($text = null, Icon $icon = null, ContextualStyle $style = null): ModalButton
	{
		return new ModalButton($this, $text, $icon, $style);
	}
	
	public function includeToggleButton($text = null, Icon $icon = null, ContextualStyle $style = null): ModalButton
	{
		$button = new ModalButton($this, $text, $icon, $style);
		parent::addChild($button);
		return $button;
	}
	
	public function header(): HtmlElement
	{
		if(!$this->header->hasWidget()) {
			$header = new HtmlElement("div");
			$header->addClass("modal-header");
			
			$button = new Button();
			$button->removeClasses();
			$button->addClass("close");
			$button->setData("dismiss", "modal");
			$button->setAria("label", "Close");
			
			$span = new HtmlElement("span");
			$span->setAria("hidden", "true");
			$span->addChild(new HtmlBlob("&times;"));
			$button->addChild($span);
			
			$header->addChild($button);
			
			$this->title = new Stub();
			$header->addChild($this->title);
			
			$this->header->setWidget($header);
		}
		return $this->header->widget();
	}
	
	public function setTitle(string $title, string $subtitle = null): void
	{
		$this->header();
		
		$titleWidget = new Header($title, "h4", $subtitle);
		$titleWidget->addClass("modal-title");
		
		$this->title->setWidget($titleWidget);
	}
	
	public function body(): HtmlElement
	{
		return $this->body;
	}
	
	public function footer(): HtmlElement
	{
		if(!$this->footer->hasWidget()) {
			$footer = new HtmlElement("div");
			$footer->addClass("modal-footer");
			$this->footer->setWidget($footer);
		}
		return $this->footer->widget();
	}
	
	public function addChild(Widget $child): void
	{
		$this->body->addChild($child);
	}
	
	public function prependChild(Widget $child): void
	{
		$this->body->prependChild($child);
	}
	
	public function addText(string $text): void
	{
		$this->body->addText($text);
	}
	
	public function prependText(string $text): void
	{
		$this->body->prependText($text);
	}
	
	public function removeChildren(): void
	{
		$this->body->removeChildren();
	}
	
	public function addCloseButton(string $label = "Close", Icon $icon = null)
	{
		$button = new Button($label, $icon, ContextualStyle::default());
		$button->setData("dismiss", "modal");
		$this->footer()->addChild($button);
	}
	
	public function render(): string
	{
		$output = parent::render();
		if($this->isActive()) {
			$output .= (new JavascriptCode("$(function() { $('#" . $this->id() . "').modal('show'); })"))->render();
		}
		return $output;
	}
}
