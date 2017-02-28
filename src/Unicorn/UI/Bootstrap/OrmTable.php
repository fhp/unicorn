<?php

namespace Unicorn\UI\Bootstrap;

class OrmTable extends Table
{
	/** @var iterable */
	protected $data;
	
	function __construct(iterable $data)
	{
		$this->data = $data;
		
		parent::__construct();
	}
	
	public function addColumnFunction(string $header, callable $function): void
	{
		$values = array();
		foreach($this->data as $element) {
			$values[] = $function($element);
		}
		$this->addColumn($header, $values);
	}
}
