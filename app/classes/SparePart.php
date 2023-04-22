<?php

namespace App\Classes;

class SparePart {

    private $id;
    private $name;
    private $type;
    private $price;

    public function __construct($id, $name, $type) {
        $this->id = $id;
        $this->name = $name;
        $this->type = $type;
        $this->price = 0;
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getType() {
        return $this->type;
    }

    public function getPrice() {
        return $this->price;
    }

    public function setPrice($price) {
        $this->price = $price;
    }
}