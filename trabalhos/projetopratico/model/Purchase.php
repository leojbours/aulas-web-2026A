<?php
class Purchase
{
    private $id;
    private $instrumentId;
    private $transactionId;

    public function __construct($instrumentId, $transactionId, $id = null)
    {
        $this->instrumentId = $instrumentId;
        $this->transactionId = $transactionId;
        $this->id = $id;
    }

    public function getId() { return $this->id; }
    public function getInstrumentId() { return $this->instrumentId; }
    public function getTransactionId() { return $this->transactionId; }
}