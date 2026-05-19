<?php

class Database {
    private static ?PDO $instance = null;

    private function __construct() {
        $host = "localhost";
        $porta = "5432";
        $database = "instrument_shop";
        $usuario = "postgres";
        $senha = "postgres";

        $dsn = "pgsql:host=$host;port=$porta;dbname=$database";
        self::$instance = new PDO($dsn, $usuario, $senha);
    }

    public static function getInstance() {
        if (self::$instance == null) {
            new self();
        }

        return self::$instance;
    }
}