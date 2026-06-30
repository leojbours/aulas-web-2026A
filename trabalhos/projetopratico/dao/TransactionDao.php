<?php
require_once __DIR__ . '/../Database.php';
require_once __DIR__ . '/../model/Transaction.php';
require_once __DIR__ . '/InstrumentDao.php';
require_once __DIR__ . '/PurchaseDao.php';
require_once __DIR__ . '/fetcher/TransactionFetcher.php';

class TransactionDao
{
    private $table = 'transactions';
    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function findAll() {
        $sql = "SELECT * FROM $this->table ORDER BY occurred_at DESC";
        $stmt = $this->db->query($sql);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $transactions = [];
        foreach ($rows as $row) {
            $transactions[] = TransactionFetcher::fetch($row);
        }
        return $transactions;
    }
    
    public function save($buyerName, array $instrumentIds){
        $instrumentDao = new InstrumentDao();
        $purchaseDao = new PurchaseDao();

        $total = 0;
        $instruments = $instrumentDao->findManyByIds($instrumentIds);

        foreach ($instruments as $instrument) {
            $total += $instrument->getPrice();
        }

        $this->db->beginTransaction();
        try {
            $sql = "INSERT INTO $this->table (buyer_name, total_value) VALUES (?, ?)";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$buyerName, $total]);
            $transactionId = $this->db->lastInsertId();

            foreach ($instruments as $instrument) {
                $purchaseDao->save($instrument->getId(), $transactionId);
            }

            $this->db->commit();
            return $transactionId;
        } catch (Exception $e) {
            $this->db->rollBack();
            throw $e;
        }
    }
}