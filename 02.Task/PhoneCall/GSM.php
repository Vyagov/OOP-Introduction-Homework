<?php

namespace PhoneCall;

class GSM
{
	protected $model;
	protected $hasSimCard;
	protected $simMobileNumber;
	protected $outgoingCallsDuration;
	protected $lastIncomingCall;
	protected $lastOutgoingCall;
	
	public function __construct($model)
	{
		$this->model = $model;
		$this->hasSimCard = false;
	}
	
	public function getSimMobileNumber()
	{
		return $this->simMobileNumber;
	}
	
	public function getLastIncomingCall()
	{
		return $this->lastIncomingCall;
	}
	
	public function setLastIncomingCall(Call $value)
	{
		return $this->lastIncomingCall = $value;
	}
	
	public function getLastOutgoingCall()
	{
		return $this->lastOutgoingCall;
	}
	
	public function setLastOutgoingCall(Call $value)
	{
		return $this->lastOutgoingCall = $value;
	}
	
	public function insertSimCard($simMobileNumber)
	{
		if (preg_match('/^08[0-9]{8}$/', $simMobileNumber)) {
			$this->simMobileNumber = $simMobileNumber;
			$this->hasSimCard = true;
		}
	}
	
	public function removeSimCard()
	{
		$this->hasSimCard = false;
	}
	
	public function call($receiver, $duration)
	{
		$validCall = true;
		
		if ($duration < 0 || $duration > 120) {
			$validCall = false;
		}
		
		if ($this->simMobileNumber == $receiver->getSimMobileNumber()) {
			$validCall = false;
		}
		
		if (!$this->hasSimCard || !$receiver->hasSimCard) {
			$validCall = false;
		}
		
		if ($validCall) {
			$this->setLastOutgoingCall(new Call($this->simMobileNumber, $receiver->simMobileNumber, $duration));
			
			$receiver->setLastIncomingCall(new Call($this->simMobileNumber, $receiver->simMobileNumber, $duration));
			
			$this->outgoingCallsDuration += $this->getLastOutgoingCall()->getDuration();
			
		}
	}
	
	public function getSumForCall()
	{
		return $this->outgoingCallsDuration * $this->getLastOutgoingCall()->getPriceForAMinute();
	}
	
	public function printInfoForTheLastOutgoingCall() 
	{
		if ($this->getLastOutgoingCall()) {
			return sprintf("- Outgoing: %s\n- Duration: %smin\n- Sum for all call: €%01.2f\n",
					$this->getLastOutgoingCall()->getReceiver(),
					$this->getLastOutgoingCall()->getDuration(),
					$this->getSumForCall()
				);
		} else {
			return "- No outgoing call!\n";
		}
	}
	
	public function printInfoForTheLastIncomingCall() 
	{
		if ($this->getLastIncomingCall()) {
			return sprintf("- Incoming: %s\n- Duration: %smin\n",
					$this->getLastIncomingCall()->getCaller(),
					$this->getLastIncomingCall()->getDuration()
				);
		} else {
			return "- No incoming call!\n";
		}
	}
}