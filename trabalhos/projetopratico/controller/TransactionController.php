<?php
require_once __DIR__ . '/../dao/TransactionDao.php';

class TransactionController
{
    public function findAll()
    {
        $dao = new TransactionDao();
        return $dao->findAll();
    }

    public function save()
    {
        $dao = new TransactionDao();
        $dao->save(
            $_POST['buyer_name'],
            $_POST['instrument_ids']
        );
    }
}