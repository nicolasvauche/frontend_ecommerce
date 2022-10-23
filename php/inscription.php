<?php
require_once 'helpers/formvalidation.php';
require_once 'classes/User.php';
require_once 'classes/Authentication.php';

// Récupération des données
$formData = $_POST;

// Initialisation du tableau d'erreurs de validation
$errors = [];

// Validation et nettoyage des champs
foreach ($formData as $field => $value) {
    switch ($field) {
        case 'firstname':
        case 'lastname':
            if (!empty($value)) {
                if (!validateSpecialChars($value)) {
                    $errors[$field] = 'pas de caractères spéciaux svp';
                } else {
                    $formData[$field] = htmlspecialchars($value);
                }
            }
            break;
        case 'email':
            if (!empty($value)) {
                if (!validateEmail($value)) {
                    $errors[$field] = 'une adresse email valide svp';
                } else {
                    $formData[$field] = filter_var($value, FILTER_SANITIZE_EMAIL);
                }
            } else {
                $errors[$field] = 'une adresse email pas vide svp';
            }
            break;
        case 'password':
            if (!empty($value)) {
                if (!validatePassword($value)) {
                    $errors[$field] = 'un mot de passe valide svp';
                } else {
                    $formData[$field] = strip_tags($value);
                }
            } else {
                $errors[$field] = 'un mot de passe pas vide svp';
            }
            break;
        case 'passwordconfirm':
            if (!empty($value)) {
                if (!validateEquals($formData['password'], $value)) {
                    $errors[$field] = 'Deux mots de passe identiques svp';
                }
            } else {
                $errors[$field] = 'un mot de passe pas vide svp';
            }
            break;
        default:
            break;
    }
}

if (!empty($errors)) {
    // Redirection vers le formulaire
    Header('Location: ../inscription.php?errors=' . json_encode($errors) . '&formdata=' . json_encode($formData));
} else {
    // Ajout d'un utilisateur en base de données
    $user = new User();
    $user->setFirstname($formData['firstname']);
    $user->setLastname($formData['lastname']);
    $user->setEmail($formData['email']);
    $user->setPassword($formData['password']);
    $return = $user->create();
    if (!is_array($return)) {
        // Connexion automatique
        $auth = new Authentication();
        if ($auth->login(['email' => $formData['email'], 'password' => $formData['password']])) {
            Header('Location: ../mon-compte.php');
        }
    } else {
        unset($formData['password']);
        unset($formData['passwordconfirm']);
        Header('Location: ../inscription.php?errors=' . json_encode($return) . '&formdata=' . json_encode($formData));
    }
}
