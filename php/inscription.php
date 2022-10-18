<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('helpers/formvalidation.php');
require_once 'classes/User.php';

// Récupération des données
$formData = $_POST;

// Initialisation du tableau d'erreurs de validation
$errors = [];

// Validation des champs
foreach ($formData as $field => $value) {
    switch ($field) {
        case 'firstname':
        case 'lastname':
            if (!empty($value)) {
                if (!validateSpecialChars($value)) {
                    $errors[$field] = 'pas de caractères spéciaux svp';
                }
            }
            break;
        case 'email':
            if (!empty($value)) {
                if (!validateEmail($value)) {
                    $errors[$field] = 'une adresse email valide svp';
                }
            } else {
                $errors[$field] = 'une adresse email pas vide svp';
            }
            break;
        case 'password':
            if (!empty($value)) {
                if (!validatePassword($value)) {
                    $errors[$field] = 'un mot de passe valide svp';
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
var_dump($errors);


//
$userModel = new User();
