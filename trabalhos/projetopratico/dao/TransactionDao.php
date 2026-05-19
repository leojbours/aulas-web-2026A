<?php
require_once __DIR__ . '/../Database.php';
require_once __DIR__ . '/../model/Transaction.php';
require_once __DIR__ . '/InstrumentDao.php';
require_once __DIR__ . '/PurchaseDao.php';

class TransactionDao
{
    private $table = 'transactions';
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function listar()
    {
        $sql = "SELECT * FROM $this->table ORDER BY occurred_at DESC";
        $stmt = $this->db->query($sql);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $transactions = [];
        foreach ($rows as $row) {
            $transactions[] = new Transaction(
                $row['buyer_name'],
                $row['total_value'],
                $row['occurred_at'],
                $row['id']
            );
        }
        return $transactions;
    }
    
    public function salvar($buyerName, array $instrumentIds)
    {
        $instrumentDao = new InstrumentDao();
        $purchaseDao = new PurchaseDao();

        $total = 0;
        $instruments = [];
        foreach ($instrumentIds as $id) {
            $instrument = $instrumentDao->buscarPorId($id);
            if (!$instrument) throw new Exception("Instrumento ID $id não encontrado.");
            $instruments[] = $instrument;
            $total += $instrument->getPrice();
        }

        $this->db->beginTransaction();
        try {
            $sql = "INSERT INTO $this->table (buyer_name, total_value) VALUES (?, ?)";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$buyerName, $total]);
            $transactionId = $this->db->lastInsertId();

            foreach ($instruments as $instrument) {
                $purchaseDao->salvar($instrument->getId(), $transactionId);
            }

            $this->db->commit();
            return $transactionId;
        } catch (Exception $e) {
            $this->db->rollBack();
            throw $e;
        }
    }
}