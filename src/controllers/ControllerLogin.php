<?php

namespace Thibaultbeaumont\DonkeyEvent\Controllers;

use Thibaultbeaumont\DonkeyEvent\Services\UserService;
use Thibaultbeaumont\DonkeyEvent\Validators\UserValidator;

class ControllerLogin extends Controller
{
    private UserValidator $userValidator;
    private UserService $userService;
    public function __construct(UserService $userService, UserValidator $userValidator)
    {
        $this->userValidator = $userValidator;
        $this->userService = $userService;
    }
    public function start()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $errors = $this->userValidator->validateLogin($_POST);
            if (!empty($errors)) {
                require_once(__DIR__ . '/../views/LoginView.php');
                return;
            }
            $email = htmlentities($_POST['email']);
            $password = htmlentities($_POST['password']);
            $userId = $this->userService->login($email, $password);
            if ($userId) {
                header('Location: index.php?page=filters');
                exit();
            } else {
                $errors[] = "Invalid username or password.";
            }
        }
        require_once(__DIR__ . '/../views/LoginView.php');
    }
}
