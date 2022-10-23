<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'helpers/formvalidation.php';
require_once 'classes/Authentication.php';

// Récupération des données
$formData = $_POST;

// Initialisation du tableau d'erreurs de validation
$errors = [];

// Validation et nettoyage des champs
foreach ($formData as $field => $value) {
    switch ($field) {
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
        default:
            break;
    }
}
if (!empty($errors)) {
    // Redirection vers le formulaire
    Header('Location: ../connexion.php?errors=' . json_encode($errors) . '&formdata=' . json_encode($formData));
} else {
    // Authentification de l'utilisateur
    $auth = new Authentication();
    $getAuth = $auth->login($formData);
    if (!is_array($getAuth)) {
        Header('Location: ../mon-compte.php');
    } else {
        // Redirection vers le formulaire
        unset($formData['password']);
        Header('Location: ../connexion.php?errors=' . json_encode($getAuth) . '&formdata=' . json_encode($formData));
    }
}
