<?php


namespace App\Classes;


class MaintenanceJob
{
    private $id;
    private $name;
    private $brand;
    private $model;
    private $rate;

    public function __construct($id, $name, $brand, $model, $rate) {
        $this->id = $id;
        $this->name = $name;
        $this->brand = $brand;
        $this->model = $model;
        $this->rate = $rate;
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getBrand() {
        return $this->brand;
    }

    public function getModel() {
        return $this->model;
    }

    public function getRate() {
        return $this->rate;
    }
}