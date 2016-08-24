<?php

namespace MyComputers;

class Computer
{
	protected $year;
	protected $price;
	protected $hardDiskMemory;
	protected $freeMemory;
	
	protected $isNotebook;
	
	protected $operationSystem;
	
	public function __construct($year, $price, $hardDiskMemory, $freeMemory, $operationSystem) 
	{
		$this->year = $year;
		$this->price = $price;
		$this->hardDiskMemory = $hardDiskMemory;
		$this->freeMemory = $freeMemory;
		
		$this->operationSystem = $operationSystem;
		
		$this->isNotebook = false;
	}
	
	public function setIsNotebook($value)
	{
		return $this->isNotebook = (bool)$value;
 	}
	
 	public function isTablet()
 	{
 		return $this->isNotebook ? 'Yes' : 'No';
 	}
 	
	public function changeOperationSystem($newOperationSystem)
	{
		$this->operationSystem = $newOperationSystem;
	}
	
	public function useMemory($memory) 
	{
		if ($this->freeMemory < $memory) {
			return $this->freeMemory = 'Not enough free memory!';
		} 
		
		return $this->freeMemory -= $memory;
	}
	
	public function getInfo() 
	{
		return sprintf("Year of production: %d\nPrice: €%01.2f\nHard disk memory: %dGB\nFree memory: %s\nOperation system: %s\nIs Notebook: %s\n",
				$this->year,
				$this->price,
				$this->hardDiskMemory,
				$this->freeMemory,
				$this->operationSystem,
				$this->isTablet()
				);
	}
}