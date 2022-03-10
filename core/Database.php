<?php
    namespace app\core;

    class Database {
        public \PDO $pdo;

        public function __construct() {
            $this->pdo = new \PDO('mysql:host=localhost;dbname=news_app', 'root', getenv("myAdminroot"));
            $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        }

        public function prepare($sql) {
            return $this->pdo->prepare($sql);
        }
    }