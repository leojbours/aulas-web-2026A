<?php
require_once __DIR__ . '/../Database.php';
require_once __DIR__ . '/../model/Instrument.php';
require_once __DIR__ . '/fetcher/InstrumentFetcher.php';

class InstrumentDao {

    private $table = 'instruments';
    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function save(Instrument $instrument) {
        $sql = "INSERT INTO $this->table (name, description, price) VALUES (?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$instrument->getName(), $instrument->getDescription(), $instrument->getPrice()]);
    }

    public function findAll() {
        $sql = "SELECT * FROM $this->table";
        $stmt = $this->db->query($sql);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $instruments = [];
        foreach ($rows as $row) {
            $instruments[] = InstrumentFetcher::fetch($row);
        }
        return $instruments;
    }

    public function findById($id) {
        $sql = "SELECT * FROM $this->table WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) return null;

        return InstrumentFetcher::fetch($row);
    }

    public function findManyByIds(array $ids) {
        if (empty($ids)) return [];

        $placeholders = implode(', ', array_fill(0, count($ids), '?'));

        $sql = "SELECT * FROM $this->table WHERE id IN ($placeholders)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute($ids);

        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $results = [];
        foreach ($rows as $row) {
            $results[] = InstrumentFetcher::fetch($row);
        }
        return $results;
    }

    public function delete($id) {
        $sql = "DELETE FROM $this->table WHERE id = ?";
        $ps = $this->db->prepare($sql);
        $ps->execute([$id]);
    }

    public function edit($instrument, $id) {
        $sql = "UPDATE $this->table SET name = ?, description = ?, price = ? WHERE id = ?";
        $ps = $this->db->prepare($sql);
        $ps->execute([$instrument->getName(), $instrument->getDescription(), $instrument->getPrice(), $id]);
    }
}
