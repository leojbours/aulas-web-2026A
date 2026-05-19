<?php
require_once __DIR__ . '/../dao/InstrumentDao.php';

class InstrumentController
{
    public function listar()
    {
        $dao = new InstrumentDao();
        return $dao->listar();
    }

    public function salvar()
    {
        $instrument = new Instrument(
            $_POST['name'],
            $_POST['price'],
            $_POST['description'] ?? null
        );
        $dao = new InstrumentDao();
        $dao->salvar($instrument);
    }
}