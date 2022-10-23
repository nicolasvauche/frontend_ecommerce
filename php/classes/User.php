<?php
require_once 'Bdd.php';

class User extends Bdd
{
    private $id;
    private $firstname;
    private $lastname;
    private $email;
    private $password;

    public function getId()
    {
        return $this->id;
    }

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

    public function __construct($id = null)
    {
        parent::__construct();

        if ($id) {
            $this->find($id);
        }
    }

    public function create()
    {
        if (!$this->checkEmailExists()) {
            $sql = 'INSERT INTO user (firstname, lastname, email, password) VALUES (?, ?, ?, ?)';

            try {
                $statement = $this->getConnection()->prepare($sql);
                $statement->execute([$this->firstname, $this->lastname, $this->email, password_hash($this->password, PASSWORD_DEFAULT)]);
            } catch (PDOException $exception) {
                var_dump($exception);
                exit;
            }

            return true;
        } else {
            return ['email' => 'Cet utilisateur existe déjà…'];
        }
    }

    public function checkEmailExists()
    {
        $sql = 'SELECT id FROM user WHERE email = ?';

        try {
            $statement = $this->getConnection()->prepare($sql);
            $statement->execute([$this->email]);
            $user = $statement->fetch(PDO::FETCH_ASSOC);

            return $user;
        } catch (PDOException $exception) {
            var_dump($exception);
            exit;
        }
    }

    public function find($id)
    {
        $sql = 'SELECT id, firstname, lastname, email FROM user WHERE id = ?';

        try {
            $statement = $this->getConnection()->prepare($sql);
            $statement->execute([$id]);
            $user = $statement->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $exception) {
            var_dump($exception);
            exit;
        }

        if ($user) {
            $this->id = $user['id'];
            $this->setFirstname($user['firstname']);
            $this->setLastname($user['lastname']);
            $this->setEmail($user['email']);
        }
    }
}
