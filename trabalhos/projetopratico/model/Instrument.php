<?php

class Instrument
{
    private $id;
    private $name;
    private $description;
    private $price;

    public function __construct($name, $price, $description = null, $id = null)
    {
        $this->name = $name;
        $this->price = $price;
        $this->description = $description;
        $this->id = $id;
    }

    public function getId() { return $this->id; }
    public function getName() { return $this->name; }
    public function getDescription() { return $this->description; }
    public function getPrice() { return $this->price; }
}