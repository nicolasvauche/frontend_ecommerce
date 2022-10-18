<?php
class Bdd
{
    private $serverName;
    private $userName;
    private $password;
    private $connection;

    public function __construct()
    {
        require_once '../config/bdd.php';

        $this->serverName = $servername;
        $this->userName = $username;
        $this->password = $password;

        $this->connect();
    }

    public function connect()
    {
        try {
            $this->connection = new PDO("mysql:host=$this->serverName;dbname=php_shoe", $this->userName, $this->password);
        } catch (PDOException $exception) {
            var_dump($exception);
            exit;
        }

        echo "<strong>Tu es connecté à la base de données !!!</strong>";
    }

    public function getConnection()
    {
        return $this->connection;
    }

    public function setConnection($connexion)
    {
        $this->connection = $connexion;
    }
}
