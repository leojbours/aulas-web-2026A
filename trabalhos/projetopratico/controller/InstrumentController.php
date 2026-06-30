<?php
require_once __DIR__ . '/../dao/InstrumentDao.php';
require_once __DIR__ . '/../model/Instrument.php';

class InstrumentController
{
    public function findAll() {
        $dao = new InstrumentDao();
        return $dao->findAll();
    }

    public function findById($id) {
        $dao = new InstrumentDao();
        return $dao->findById($id);
    }

    public function save() {
        $instrument = new Instrument(
            $_POST['name'],
            $_POST['price'],
            $_POST['description'] ?? null
        );
        $dao = new InstrumentDao();
        $dao->save($instrument);
    }

    public function edit($id) {
        $instrument = new Instrument(
            $_POST['name'],
            $_POST['price'],
            $_POST['description'] ?? null,
            $id
        );
        $dao = new InstrumentDao();
        $dao->edit($instrument, $id);
    }

    public function delete($id) {
        $dao = new InstrumentDao();
        $dao->delete($id);
    }
}