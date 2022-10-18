<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Validation de l'absence de caractères spéciaux
function validateSpecialChars($value)
{
    return preg_match("/^[A-z]*((-|\s-)*[A-z])*$/", $value);
}

// Validation du format de l'email
function validateEmail($value)
{
    return preg_match("/^[\w\-\.]+@([\w\-]+\.)+[\w\-]{2,4}$/", $value);
}

// Validation du format du mot de passe
function validatePassword($value)
{
    return preg_match("/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/", $value);
}

// Validation de l'égalité des deux password
function validateEquals($value1, $value2)
{
    return $value1 === $value2;
}
