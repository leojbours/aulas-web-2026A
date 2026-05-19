<?php
require_once __DIR__ . '/../dao/TransactionDao.php';

class TransactionController
{
    public function listar()
    {
        $dao = new TransactionDao();
        return $dao->listar();
    }

    public function salvar()
    {
        $dao = new TransactionDao();
        $dao->salvar(
            $_POST['buyer_name'],
            $_POST['instrument_ids']
        );
        header("Location: lista.php");
    }
}