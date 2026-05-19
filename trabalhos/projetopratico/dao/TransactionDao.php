<?php
require_once __DIR__ . '/../Database.php';
require_once __DIR__ . '/../model/Transaction.php';
require_once __DIR__ . '/InstrumentDao.php';
require_once __DIR__ . '/PurchaseDao.php';

class TransactionDao
{
    private $table = 'transactions';
    private $connection;

    public function __construct()
    {
        $db = new Database();
        $this->connection = $db->connection;
    }

    public function listar()
    {
        $sql = "SELECT * FROM $this->table ORDER BY occurred_at DESC";
        $stmt = $this->connection->query($sql);
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

        $this->connection->beginTransaction();
        try {
            $sql = "INSERT INTO $this->table (buyer_name, total_value) VALUES (?, ?)";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute([$buyerName, $total]);
            $transactionId = $this->connection->lastInsertId();

            foreach ($instruments as $instrument) {
                $purchaseDao->salvar($instrument->getId(), $transactionId);
            }

            $this->connection->commit();
            return $transactionId;
        } catch (Exception $e) {
            $this->connection->rollBack();
            throw $e;
        }
    }
}