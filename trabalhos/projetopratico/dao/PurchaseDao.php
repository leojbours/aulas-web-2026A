<?php
require_once __DIR__ . '/../Database.php';
require_once __DIR__ . '/../model/Purchase.php';

class PurchaseDao
{
    private $table = 'purchases';
    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function save($instrumentId, $transactionId) {
        $sql = "INSERT INTO $this->table (instrument_id, transaction_id) VALUES (?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$instrumentId, $transactionId]);
    }
}