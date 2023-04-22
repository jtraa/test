<?php

require_once '../vendor/autoload.php';

use App\Classes\ScheduledMaintenanceJob;
use App\Classes\SparePart;
use App\Classes\MaintenanceJob;
use App\ExternalSystem;
use Carbon\Carbon;

$externalSystem = new ExternalSystem();

class App
{
    private array $spareParts;
    private array $maintenanceJobs;

    public function __construct()
    {
        $this->createSpareParts();
        $this->fetchSparePartPrices();
        $this->createMaintenanceJobs();
        $this->run();
    }

    private function createSpareParts(): void
    {
        $this->spareParts = [
            new SparePart('1', 'Engine block', 'Engine'),
            new SparePart('2', 'Oil filter', 'Filter'),
            new SparePart('3', 'Air filter', 'Filter'),
        ];
    }

    private function fetchSparePartPrices(): void
    {
        global $externalSystem;
        foreach ($this->spareParts as $sparePart) {
            $sparePart->setPrice($externalSystem->getPrice($sparePart->getId()));
        }
    }

    private function createMaintenanceJobs(): void
    {
        $this->maintenanceJobs = [
            new MaintenanceJob('1', 'Oil change', 'Toyota', 'Corolla', 1.5),
            new MaintenanceJob('2', 'Engine tune-up', 'Honda', 'Civic', 3.0),
            new MaintenanceJob('3', 'Brake pad replacement', 'Ford', 'Focus', 2.0),
        ];
    }

    private function createScheduledMaintenanceJob(string $brand, string $model, MaintenanceJob $maintenanceJob, array $parts, float $serviceHours, Carbon $startTime, Carbon $endTime): ScheduledMaintenanceJob
    {
        return new ScheduledMaintenanceJob($brand, $model, $maintenanceJob, $parts, $serviceHours, $startTime, $endTime);
    }

    private function printScheduledMaintenanceJobDetails(ScheduledMaintenanceJob $scheduledMaintenanceJob): void
    {
        echo 'The price of the scheduled maintenance job is ' . number_format($scheduledMaintenanceJob->getTotalPrice(), 2) . ' Euro.' . PHP_EOL;
    }

    private function run(): void
    {
        $scheduledMaintenanceJob = $this->createScheduledMaintenanceJob(
            'Toyota',
            'Corolla',
            $this->maintenanceJobs[0],
            [$this->spareParts[0], $this->spareParts[1]],
            2.5,
            Carbon::parse('2023-05-01 10:00:00'),
            Carbon::parse('2023-05-01 13:00:00')
        );

        $this->printScheduledMaintenanceJobDetails($scheduledMaintenanceJob);
    }
}

$app = new App();
