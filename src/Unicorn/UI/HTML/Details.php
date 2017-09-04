<?php

namespace Unicorn\UI\HTML;

use Unicorn\UI\Base\HtmlElement;
use Unicorn\UI\Base\Stub;
use Unicorn\UI\HTML\Attributes\Open;

class Details extends HtmlElement
{
	use Open;
	
	private $summaryStub;
	
	/**
	 * @param string|Summary $summary
	 */
	function __construct($summary = null)
	{
		parent::__construct("details");
		
		$this->summaryStub = new Stub();
		$this->addChild($this->summaryStub);
		
		if($summary !== null) {
			$this->setSummary($summary);
		}
	}
	
	function summary(): Summary
	{
		return $this->summaryStub->widget();
	}
	
	function hasSummary(): bool
	{
		return $this->summaryStub->hasWidget();
	}
	
	/**
	 * @param string|Summary $summary
	 */
	function setSummary($summary)
	{
		if(is_string($summary)) {
			$summary = new Summary($summary);
		}
		$this->summaryStub->setWidget($summary);
	}
	
}
