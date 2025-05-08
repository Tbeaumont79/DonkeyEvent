<?php

namespace Thibaultbeaumont\DonkeyEvent\Validators;

class UserValidator
{
    public function __construct() {}

    public function validateRegister(array $user): array
    {
        $errors = [];
        if (empty($user['firstname']))
            $errors[] = 'Le prénom est requis';
        if (empty($user['lastname']))
            $errors[] = 'Le nom est requis';
        if (empty($user['email']) || !filter_var($user['email'], FILTER_VALIDATE_EMAIL))
            $errors[] = 'L\'email est requis et doit être valide';
        if (empty($user['password']) || strlen($user['password']) < 8)
            $errors[] = 'Le mot de passe est requis et doit contenir au moins 8 caractères';
        return $errors;
    }

    public function validateLogin(array $user): array
    {
        $errors = [];
        if (empty($user['email']) || !filter_var($user['email'], FILTER_VALIDATE_EMAIL))
            $errors[] = 'L\'email est requis et doit être valide';
        if (empty($user['password']))
            $errors[] = 'Le mot de passe est requis';
        return $errors;
    }
}
