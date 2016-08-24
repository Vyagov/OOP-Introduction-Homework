<?php

use MyComputers\Computer;

require_once 'autoload.php';

$firstComputer = new Computer(2008, 500, 100, 10, 'Windows XP');
$secondComputer = new Computer(2011, 1000, 160, 9, 'Linux');

$firstComputer->setIsNotebook(true);

$secondComputer->useMemory(10);
$firstComputer->changeOperationSystem('Windows 8');

echo 'First computer', PHP_EOL, PHP_EOL, $firstComputer->getInfo();
echo '====================================', PHP_EOL;
echo 'Second computer', PHP_EOL, PHP_EOL, $secondComputer->getInfo();