<?php

class BankAccount {
    private $ownerName;
    private $accountNumber;
    private $initialFund;
    
    public function __construct($ownerName, $accountNumber, $initialFund) {
        $this->ownerName = $ownerName;
        $this->accountNumber = $accountNumber;
        $this->initialFund = $initialFund;
    }

    public function printInfo() {
        echo "ownerName: $this->ownerName, accountNumber: $this->accountNumber, initialFund: $this->initialFund";
    }
}