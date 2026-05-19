<?php
require_once __DIR__ . '/../Database.php';
require_once __DIR__ . '/../model/Instrument.php';

class InstrumentDao
{
    private $table = 'instruments';
    private $connection;

    public function __construct()
    {
        $db = new Database();
        $this->connection = $db->connection;
    }

    public function salvar(Instrument $instrument)
    {
        $sql = "INSERT INTO $this->table (name, description, price) VALUES (?, ?, ?)";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([$instrument->getName(), $instrument->getDescription(), $instrument->getPrice()]);
    }

    public function listar()
    {
        $sql = "SELECT * FROM $this->table";
        $stmt = $this->connection->query($sql);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $instruments = [];
        foreach ($rows as $row) {
            $instruments[] = new Instrument(
                $row['name'],
                $row['price'],
                $row['description'],
                $row['id']
            );
        }
        return $instruments;
    }

    public function buscarPorId($id)
    {
        $sql = "SELECT * FROM $this->table WHERE id = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([$id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) return null;

        return new Instrument(
            $row['name'],
            $row['price'],
            $row['description'],
            $row['id']
        );
    }
}