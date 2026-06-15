<?php

class Car {
    private $brand;
    private $type;
    private $year;
    
    public function __construct($brand, $type, $year) {
        $this->brand = $brand;
        $this->type = $type;
        $this->year = $year;
    }

    public function printInfo() {
        echo "Brand: $this->brand, type: $this->type, year: $this->year";
    }
}