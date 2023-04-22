<?php


namespace App;


class MaintenanceJob
{
    private $id;
    private $name;
    private $brand;
    private $model;
    private $fixedRate;

    public function __construct($id, $name, $brand, $model, $fixedRate) {
        $this->id = $id;
        $this->name = $name;
        $this->brand = $brand;
        $this->model = $model;
        $this->fixedRate = $fixedRate;
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

    public function getFixedRate() {
        return $this->fixedRate;
    }
}