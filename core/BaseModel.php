<?php
    namespace app\core;

    class BaseModel {
        private \PDO $pdo;

        public function __construct() {
            $this->pdo = new \PDO('mysql:host=localhost;dbname=news_app', 'root', getenv("myAdminroot"));
            $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        }

        public function test() {
            $statement = $this->pdo->query("SELECT users_fname FROM users WHERE id=1");
            $result = $statement->fetch(\PDO::FETCH_ASSOC);
            return $result;
        }
    }