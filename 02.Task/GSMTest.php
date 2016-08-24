<?php

use PhoneCall\GSM;

require_once 'autoload.php';

$gsm1 = new GSM('Lenovo');
$gsm1->insertSimCard('0898641601');

$gsm2 = new GSM('Nokia');
$gsm2->insertSimCard('0899444555');

$gsm2->call($gsm1, 13);
$gsm1->call($gsm2, 19);
$gsm1->call($gsm2, 8);
$gsm2->call($gsm1, 7);


echo 'Info call for first gsm:', PHP_EOL,
		$gsm1->printInfoForTheLastOutgoingCall(), PHP_EOL,
		$gsm1->printInfoForTheLastIncomingCall(), PHP_EOL,
	'=========================================', PHP_EOL,
	'Info call for second gsm:', PHP_EOL,
		$gsm2->printInfoForTheLastOutgoingCall(), PHP_EOL,
		$gsm2->printInfoForTheLastIncomingCall();