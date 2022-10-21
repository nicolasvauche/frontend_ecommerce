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

                echo '<p><strong>Bienvenue chez toi, ' . $user['firstname'] . ' !</strong></p>';
            } else {
                echo "<p><strong>T'as pas mis le bon mot de passe :(</strong></p>";
            }
        } else {
            echo "<p><strong>Tu n'existes pas :(</strong></p>";
        }
    }
}
