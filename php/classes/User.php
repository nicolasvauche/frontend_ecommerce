<?php
require_once 'Bdd.php';

class User extends Bdd
{
    private $firstname;
    private $lastname;
    private $email;
    private $password;

    public function getFirstname()
    {
        return $this->firstname;
    }

    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    public function getLastname()
    {
        return $this->lastname;
    }

    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function __construct()
    {
        parent::__construct();
    }

    public function create()
    {
        $sql = 'INSERT INTO user (firstname, lastname, email, password) VALUES (?, ?, ?, ?)';

        try {
            $statement = $this->getConnection()->prepare($sql);
            $statement->execute([$this->firstname, $this->lastname, $this->email, password_hash($this->password, PASSWORD_DEFAULT)]);
        } catch (PDOException $exception) {
            var_dump($exception);
            exit;
        }

        echo '<p><strong>Ton utilisateur a bien été créé !</strong></p>';
    }
}
