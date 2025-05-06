<?php
require_once('models/LoginModel.php');
class ControllerLogin extends Controller
{
    public function __construct() {}
    public function start()
    {
        if (isset($_SESSION['user']) && $_SESSION['user'] != null)
            header('Location: index.php?page=filters');
        if (!isset($_POST['email']) || !isset($_POST['password']))
            require_once('views/LoginView.php');
        else {
            $email = htmlentities($_POST['email']);
            $password = htmlentities($_POST['password']);
            $loginModel = new LoginModel($email, $password);
            $loginModel->login();
            header('Location: index.php?page=filters');
        }
    }
}
