<?php

namespace App\Classes;

class ScheduledMaintenanceJob
{
    private $carBrand;
    private $carModel;
    private $maintenanceJob;
    private $parts = array();
    private $serviceHours;
    private $startTime;
    private $endTime;
    private $weekendSurcharge = 1.5;
    private $vatRate = 0.21;

    public function __construct($carBrand, $carModel, $maintenanceJob, $parts, $serviceHours, $startTime, $endTime)
    {
        $this->carBrand = $carBrand;
        $this->carModel = $carModel;
        $this->maintenanceJob = $maintenanceJob;
        $this->parts = $parts;
        $this->serviceHours = $serviceHours;
        $this->startTime = $startTime;
        $this->endTime = $endTime;
    }

    public function getCarBrand()
    {
        return $this->carBrand;
    }

    public function getCarModel()
    {
        return $this->carModel;
    }

    public function getMaintenanceJob()
    {
        return $this->maintenanceJob;
    }

    public function getParts()
    {
        return $this->parts;
    }

    public function getServiceHours()
    {
        return $this->serviceHours;
    }

    public function getStartTime()
    {
        return $this->startTime;
    }

    public function getEndTime()
    {
        return $this->endTime;
    }

    public function setWeekendSurcharge($weekendSurcharge)
    {
        $this->weekendSurcharge = $weekendSurcharge;
    }

    public function getWeekendSurcharge()
    {
        return $this->weekendSurcharge;
    }

    public function setVatRate($vatRate)
    {
        $this->vatRate = $vatRate;
    }

    public function getVatRate()
    {
        return $this->vatRate;
    }

    public function getTotalPrice()
    {
        // Calculate the price for the service hours
        $price = $this->serviceHours * $this->maintenanceJob->getRate();

        // Add the cost of the parts
        foreach ($this->parts as $part) {
            $price += $part->getPrice();
        }

        // Add the weekend surcharge
        if ($this->startTime->isWeekend()) {
            $price *= $this->weekendSurcharge;
        }

        // Add VAT
        $price *= (1 + $this->vatRate);

        return $price;
    }
}
