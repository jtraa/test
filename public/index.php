<?php

require_once '../app/classes/SparePart.php';
require_once '../app/classes/MaintenanceJob.php';
require_once '../app/ExternalSystem.php';
require_once '../vendor/autoload.php';

use App\Classes\ScheduledMaintenanceJob;
use App\Classes\SparePart;
use App\ExternalSystem;
use App\Classes\MaintenanceJob;
use Carbon\Carbon;

function createSpareParts()
{
    return array(
        new SparePart('1', 'Engine block', 'Engine'),
        new SparePart('2', 'Oil filter', 'Filter'),
        new SparePart('3', 'Air filter', 'Filter'),
    );
}

function fetchSparePartPrices($spareParts)
{
    $externalSystem = new ExternalSystem();
    foreach ($spareParts as $sparePart) {
        $sparePart->setPrice($externalSystem->getPrice($sparePart->getId()));
    }
}

function createMaintenanceJobs() {
    return array(
        new MaintenanceJob('1', 'Oil change', 'Toyota', 'Corolla', 1.5),
        new MaintenanceJob('2', 'Engine tune-up', 'Honda', 'Civic', 3.0),
        new MaintenanceJob('3', 'Brake pad replacement', 'Ford', 'Focus', 2.0),
    );
}

function createScheduledMaintenanceJob($brand, $model, $maintenanceJob, $parts, $serviceHours, $startTime, $endTime) {
    return new ScheduledMaintenanceJob($brand, $model, $maintenanceJob, $parts, $serviceHours, $startTime, $endTime);
}

function printScheduledMaintenanceJobDetails($scheduledMaintenanceJob) {
    echo 'The price of the scheduled maintenance job is ' . number_format($scheduledMaintenanceJob->getTotalPrice(), 2) . ' USD.' . PHP_EOL;
}


$spareParts = createSpareParts();
fetchSparePartPrices($spareParts);
$maintenanceJobs = createMaintenanceJobs();
$scheduledMaintenanceJob = createScheduledMaintenanceJob('Toyota', 'Corolla', $maintenanceJobs[0], array($spareParts[0], $spareParts[1]), 2.5, Carbon::parse('2023-05-01 10:00:00'), Carbon::parse('2023-05-01 13:00:00'));
printScheduledMaintenanceJobDetails($scheduledMaintenanceJob);