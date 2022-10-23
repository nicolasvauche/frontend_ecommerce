<?php
require_once 'Bdd.php';

class Authentication extends Bdd
{
    public function __construct()
    {
        parent::__construct();
    }

    public function login($userData)
    {
        $sql = 'SELECT * FROM user WHERE email = ?';

        try {
            $statement = $this->getConnection()->prepare($sql);
            $statement->execute([$userData['email']]);
            $user = $statement->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $exception) {
            var_dump($exception);
            exit;
        }

        if ($user) {
            if (password_verify($userData['password'], $user['password'])) {
                session_start();
                $_SESSION['userid'] = $user['id'];

                return true;
            } else {
                return ['password' => "T'as pas mis le bon mot de passe :("];
            }
        } else {
            return ['email' => "Ah non, nous n'avons jamais enregistré cette adresse e-mail"];
        }
    }
}
