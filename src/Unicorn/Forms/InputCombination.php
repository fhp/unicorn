<?php

namespace Unicorn\Forms;

abstract class InputCombination extends Input
{
	/** @var Input[] */
	private $children = array();
	
	/**
	 * @return Input[]
	 */
	public function inputs(): array
	{
		return $this->children;
	}

	public function addInput(Input $input): void
	{
		$this->children[] = $input;
	}
	
	public function check(): void
	{
		parent::check();
		
		foreach($this->children as $child) {
			$child->check();
		}
	}
	
	public function isSane(): bool
	{
		$sane = true;
		
		$sane &= parent::isSane();
		
		foreach($this->children as $child) {
			$sane &= $child->isSane();
		}
		return $sane;
	}
	
	public function value()
	{
		$values = array();
		foreach($this->inputs() as $input) {
			$values[$input->name()] = $input->value();
		}
		return $values;
	}
	
	public function prefix(): string
	{
		return parent::prefix() . $this->name() . "-";
	}
}
