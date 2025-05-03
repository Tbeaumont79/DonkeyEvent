<?php

class ControllerLogin
{

    public function start()
    {
        if (!isset($_POST['email']) || !isset($_POST['password']))
            require_once('views/login.php');

        $loginModel = new LoginModel($_POST['email'], $_POST['password']);
        $loginModel->login();
    }
}
