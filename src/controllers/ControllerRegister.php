<?php

namespace Thibaultbeaumont\DonkeyEvent\Controllers;

use Thibaultbeaumont\DonkeyEvent\Validators\UserValidator;
use Thibaultbeaumont\DonkeyEvent\Services\UserService;

class ControllerRegister
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
            $errors = $this->userValidator->validateRegister($_POST);
            if (!empty($errors)) {
                require_once(__DIR__ . '/../views/RegisterView.php');
                return;
            }
            $userId = $this->userService->register($_POST, "member");
            $_SESSION['user'] = $userId;
            header('Location: index.php?page=filters');
            exit();
        }
        require_once(__DIR__ . '/../views/RegisterView.php');
    }
}
