<?php

use Company\Employee;
use Company\Task;

require_once 'autoload.php';

$person1 = new Employee('Ivan');
$person1->setHoursLeft(4);
$person1->setCurrentTask(new Task('Task for Ivan', 7));

$person2 = new Employee('Pesho');
$person2->setHoursLeft(8);
$person2->setCurrentTask(new Task('Task for Pesho', 7));

$person1->work();
echo PHP_EOL;
$person2->work();
