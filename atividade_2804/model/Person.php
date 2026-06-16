<?php

class Person {
    private $name;
    private $age;

    public function __construct($name, $age) {
        $this->name = $name;
        $this->age = $age;
    }

    public function printInfo() {
        echo "A pessoa: $this->name tem $this->age anos de idade!";
    }
}