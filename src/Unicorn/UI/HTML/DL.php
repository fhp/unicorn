<?php

namespace Unicorn\UI\HTML;

use Unicorn\UI\Base\HtmlElementWidget;

class DL extends HtmlElementWidget
{
	function __construct()
	{
		parent::__construct("dl");
	}
	
	/**
	 * @param string|DT $term
	 * @param string|DL|null $description
	 * @return DD
	 */
	public function addTermDescription($term, $description = null): DD
	{
		$this->addTerm($term);
		return $this->addDescription($description);
	}
	
	public function addTerm($term): DT
	{
		if(is_a($term, "DT")) {
			$item = $term;
		} else {
			$item = new DT($term);
		}
		
		$this->container()->addChild($item);
		
		return $item;
	}
		
	
	public function addDescription($description): DD
	{
		if(is_a($description, "DD")) {
			$item = $description;
		} else {
			$item = new DD($description);
		}
		
		$this->container()->addChild($item);
		
		return $item;
	}
}
