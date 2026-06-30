<?php

require_once __DIR__ . '/../../model/Transaction.php';

class TransactionFetcher {
    public static function fetch($row) {
        return new Transaction(
            $row['buyer_name'],
            $row['total_value'],
            $row['occurred_at'],
            $row['id']
        );
    }
}