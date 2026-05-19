<?php
require_once __DIR__ . '/../Database.php';
require_once __DIR__ . '/../model/Purchase.php';

class PurchaseDao
{
    private $table = 'purchases';
    private $connection;

    public function __construct()
    {
        $db = new Database();
        $this->connection = $db->connection;
    }

    public function salvar($instrumentId, $transactionId)
    {
        $sql = "INSERT INTO $this->table (instrument_id, transaction_id) VALUES (?, ?)";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([$instrumentId, $transactionId]);
    }
}