<?php

namespace PhoneCall;

class Call 
{
	protected static $priceForAMinute = 0.13;
	
	protected $caller;
	protected $receiver;
	protected $duration;
	
	public function __construct($caller, $receiver, $duration) {
		$this->caller = $caller;
		$this->receiver = $receiver;
		$this->duration = $duration;
	}
	
	public function getPriceForAMinute() {
		return self::$priceForAMinute;
	}
	
	public function getCaller() 
	{
		return $this->caller;
	}
	
	public function setCaller($value)
	{
		return $this->caller = $value;
	}
	
	public function getReceiver()
	{
		return $this->receiver;
	}
	
	public function setReceiver($value)
	{
		return $this->receiver = $value;
	}
	
	public function getDuration()
	{
		return $this->duration;
	}
	
	public function setDuration($value)
	{
		if ($value >= 0 && $value <= 120) {
			return $this->duration = $value;
		}
	}
}