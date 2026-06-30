<?php

require_once __DIR__ . '/../../model/Person.php';

class PersonFetcher {
    public static function fetch($row) {
        return new Person(
            $row['name'],
            $row['adress_road'],
            $row['adress_number'],
            $row['cep'],
            $row['city'],
            $row['state'],
            $row['id']
        );
    }
}