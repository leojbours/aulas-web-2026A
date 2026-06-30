<?php

class Person {
    private $id;
    private $name;
    private $adressRoad;
    private $adressNumber;
    private $CEP;
    private $city;
    private $state;

    public function __construct(
        $name,
        $adressRoad,
        $adressNumber,
        $CEP,
        $city,
        $state,
        $id
    ) {
        $this->name = $name;
        $this->adressRoad = $adressRoad;
        $this->adressNumber = $adressNumber;
        $this->CEP = $CEP;
        $this->city = $city;
        $this->state = $state;
        $this->id = $id;
    }

    public function getId() { return $this->id; }
    public function setId($id) { $this->id = $id; }

    public function getName() { return $this->name; }
    public function setName($name) { $this->name = $name; }

    public function getAdressRoad() { return $this->adressRoad; }
    public function setAdressRoad($adressRoad) { $this->adressRoad = $adressRoad; }

    public function getAdressNumber() { return $this->adressNumber; }
    public function setAdressNumber($adressNumber) { $this->adressNumber = $adressNumber; }

    public function getCEP() { return $this->CEP; }
    public function setCEP($CEP) { $this->CEP = $CEP; }

    public function getCity() { return $this->city; }
    public function setCity($city) { $this->city = $city; }

    public function getState() { return $this->state; }
    public function setState($state) { $this->state = $state; }
}