<?php
require_once __DIR__ . '/../Database.php';
require_once __DIR__ . '/../model/Person.php';
require_once __DIR__ . '/fetcher/PersonFetcher.php';

class PersonDao {

    private $table = 'person';
    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function save(Person $person) {
        $sql = "INSERT INTO $this->table (name, address_road, address_number, cep, city, state) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            $person->getName(),
            $person->getAdressRoad(),
            $person->getAdressNumber(),
            $person->getCEP(),
            $person->getCity(),
            $person->getState()
        ]);
    }

    public function findAll() {
        $sql = "SELECT * FROM $this->table";
        $stmt = $this->db->query($sql);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $persons = [];
        foreach ($rows as $row) {
            $persons[] = PersonFetcher::fetch($row);
        }
        return $persons;
    }

    public function findById($id) {
        $sql = "SELECT * FROM $this->table WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) return null;

        return PersonFetcher::fetch($row);
    }

    public function delete($id) {
        $sql = "DELETE FROM $this->table WHERE id = ?";
        $ps = $this->db->prepare($sql);
        $ps->execute([$id]);
    }

    public function edit(Person $person, $id) {
        $sql = "UPDATE $this->table SET name = ?, address_road = ?, address_number = ?, cep = ?, city = ?, state = ? WHERE id = ?";
        $ps = $this->db->prepare($sql);
        $ps->execute([
            $person->getName(),
            $person->getAdressRoad(),
            $person->getAdressNumber(),
            $person->getCEP(),
            $person->getCity(),
            $person->getState(),
            $id
        ]);
    }
}