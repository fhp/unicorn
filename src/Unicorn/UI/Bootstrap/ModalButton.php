<?php

namespace Unicorn\UI\Bootstrap;

class ModalButton extends Button
{
	private $modal;
	
	function __construct(Modal $modal, $text = null, Icon $icon = null, ContextualStyle $style = null)
	{
		$this->modal = $modal;
		
		parent::__construct($text, $icon, $style);
		
		$this->setData("toggle", "modal");
		$this->setData("target", "#" . $modal->id());
	}
}
