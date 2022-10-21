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
        require_once '../config/bdd.php';

        try {
            $this->connection = new PDO("mysql:host=$servername;dbname=php_shoe", $username, $password);
        } catch (PDOException $exception) {
            var_dump($exception);
            exit;
        }

        echo "<p><strong>Tu es connecté à la base de données !!!</strong></p>";
    }
}
