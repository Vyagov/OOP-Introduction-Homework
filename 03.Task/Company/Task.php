<?php

namespace Company;

class Task
{
	protected $name;
	protected $workingHours;
	
	public function __construct($name, $workingHours)
	{
		$this->name = (string)$name;
		$this->workingHours = (int)$workingHours;
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
	
	public function getWorkingHours()
	{
		return $this->workingHours;
	}
	
	public function setWorkingHours($value)
	{
		if (is_numeric($value)) {
			return $this->workingHours = (int)$value;
		}
	}
}