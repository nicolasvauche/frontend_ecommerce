<?php
require_once 'helpers/formvalidation.php';
require_once 'classes/User.php';

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
//var_dump($errors);


// Ajout d'un utilisateur en base de données
$user = new User();
$user->setFirstname($formData['firstname']);
$user->setLastname($formData['lastname']);
$user->setEmail($formData['email']);
$user->setPassword($formData['password']);
$user->create();
