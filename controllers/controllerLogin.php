<?php
require_once('models/login.php');
class ControllerLogin extends Controller
{
    public function __construct() {}
    public function start()
    {
        if (isset($_SESSION['user']) && $_SESSION['user'] != null)
            header('Location: views/liste.php');
        if (!isset($_POST['email']) || !isset($_POST['password']))
            require_once('views/login.php');
        else {
            $loginModel = new LoginModel($_POST['email'], $_POST['password']);
            $loginModel->login();
            header('Location: views/liste.php');
        }
    }
}
