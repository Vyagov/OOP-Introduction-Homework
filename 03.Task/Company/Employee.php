<?php

namespace Company;

class Employee
{
	protected $name;
	protected $currentTask;
	protected $hoursLeft;
	
	public function __construct($name)
	{
		$this->name = (string)$name;
	}
	
	public function getName()
	{
		return $this->name;
	}
	
	public function setName($value)
	{
		if ($value != '') {
			return $this->name = (string)$value;
		}
	}
	
	public function getCurrentTask()
	{
		return $this->currentTask;
	}
	
	public function setCurrentTask(Task $value)
	{
		if ($value != '') {
			return $this->currentTask = $value;
		}
	}
	
	public function getHoursLeft()
	{
		return $this->hoursLeft;
	}
	
	public function setHoursLeft($value)
	{
		if (is_numeric($value) && $value >= 0) {
			return $this->hoursLeft = (int)$value;
		}
	}
	
	public function work()
	{
		if ($this->currentTask->getWorkingHours() >= $this->hoursLeft) {
			$this->currentTask->setWorkingHours($this->currentTask->getWorkingHours() - $this->hoursLeft);
			$this->setHoursLeft(0);
		} else {
			$this->setHoursLeft($this->getHoursLeft() - $this->currentTask->getWorkingHours());
			$this->currentTask->setWorkingHours(0);
		}
		
		echo $this->showReport();
	}
	
	public function showReport() 
	{
		return sprintf("Name: %s\nTask name: %s\nHours for working: %s\nHours for task: %s\n",
				$this->getName(),
				$this->currentTask->getName(),
				$this->getHoursLeft(),
				$this->currentTask->getWorkingHours()
			);
	}
}