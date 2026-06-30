<?php
class Transaction
{
    private $id;
    private $buyerName;
    private $occurredAt;
    private $totalValue;

    public function __construct($buyerName, $totalValue, $occurredAt = null, $id = null) {
        $this->buyerName = $buyerName;
        $this->totalValue = $totalValue;
        $this->occurredAt = $occurredAt;
        $this->id = $id;
    }

    public function getId() { return $this->id; }
    public function getBuyerName() { return $this->buyerName; }
    public function getOccurredAt() { return $this->occurredAt; }
    public function getTotalValue() { return $this->totalValue; }
}