<?php

class Bdd
{
    private $connection;

    public function getConnection()
    {
        return $this->connection;
    }

    public function __construct()
    {
        $this->connect();
    }

    public function connect()
    {
        try {
            require_once '../config/bdd.php';
            $this->connection = new PDO("mysql:host=" . getenv('DB_HOST') . ";dbname=" . getenv('DB_NAME'), getenv('DB_USER'), getenv('DB_PASSWORD'));
        } catch (PDOException $exception) {
            var_dump($exception);
            exit;
        }

        //echo "<p><strong>Tu es connecté à la base de données !!!</strong></p>";
    }
}
