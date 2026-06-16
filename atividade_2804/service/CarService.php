<?php

include '../model/Car.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $brand = $_POST["brand"];
    $type = $_POST["type"];
    $year = $_POST["year"];

    $car = new Car($brand, $type, $year);
    $car->printInfo();
}