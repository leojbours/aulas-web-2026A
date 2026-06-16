<?php

include '../model/Person.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $age = $_POST["age"];

    $person = new Person($name, $age);
    $person->printInfo();
}