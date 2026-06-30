<?php

class Database {
    private static ?PDO $instance = null;

    private function __construct() {
        $host = getenv("DB_HOST");
        $porta = getenv("DB_PORT");
        $database = getenv("DB_NAME");
        $usuario = getenv("DB_USER");
        $senha = getenv("DB_PASS");

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