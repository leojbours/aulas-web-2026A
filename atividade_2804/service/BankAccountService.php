<?php

include '../model/BankAccount.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ownerName = $_POST["ownerName"];
    $accountNumber = $_POST["accountNumber"];
    $initialFund = $_POST["initialFund"];

    $bankAccount = new BankAccount($ownerName, $accountNumber, $initialFund);
    $bankAccount->printInfo();
}