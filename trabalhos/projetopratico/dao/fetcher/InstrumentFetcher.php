<?php

require_once __DIR__ . '/../../model/Instrument.php';

class InstrumentFetcher {
    public static function fetch($row) {
        return new Instrument(
                $row['name'],
                $row['price'],
                $row['description'],
                $row['id']
            );
    }
}