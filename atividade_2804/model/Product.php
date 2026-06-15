<?php

class Product {
    private $name;
    private $price;

    public function __construct($name, $price) {
        $this->name = $name;
        $this->price = $price;
    }

    public function printInfo() {
        echo "Name: $this->name, price: $this->price";
    }
}