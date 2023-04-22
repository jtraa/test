<?php

require_once '../app/classes/SparePart.php';
require_once '../app/classes/MaintenanceJob.php';
require_once '../app/ExternalSystem.php';

use App\Classes\SparePart;
use App\ExternalSystem;
use App\MaintenanceJob;

$spareParts = array(
    new SparePart('1', 'Engine block', 'Engine'),
    new SparePart('2', 'Oil filter', 'Filter'),
    new SparePart('3', 'Air filter', 'Filter'),
);

$externalSystem = new ExternalSystem();
foreach ($spareParts as $sparePart) {
    $sparePart->setPrice($externalSystem->getPrice($sparePart->getId()));
}

foreach ($spareParts as $sparePart) {
    echo $sparePart->getName() . ': ' . $sparePart->getPrice() . ' EURO' . PHP_EOL . '<br />';
}

$maintenanceJobs = array(
    new MaintenanceJob('1', 'Oil change', 'Toyota', 'Corolla', 1.5),
    new MaintenanceJob('2', 'Engine tune-up', 'Honda', 'Civic', 3.0),
    new MaintenanceJob('3', 'Brake pad replacement', 'Ford', 'Focus', 2.0),
);;