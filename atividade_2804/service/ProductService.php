<?php

include '../model/Product.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $price = $_POST["price"];

    $product = new Product($name, $price);
    $product->printInfo();
}