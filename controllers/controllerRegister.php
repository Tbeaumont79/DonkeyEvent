<?php
require_once('models/register.php');
class ControllerRegister extends Controller
{
    public function __construct() {}
    public function start()
    {
        if (!isset($_POST['firstname']) || !isset($_POST['lastname']) || !isset($_POST['password']) || !isset($_POST['gender']) || !isset($_POST['e-mail']))
            require_once('views/register.php');
        else {
            $firstname = htmlentities($_POST['firstname']);
            $lastname = htmlentities($_POST['lastname']);
            $password = htmlentities($_POST['password']);
            $gender = htmlentities($_POST['gender']);
            $email = htmlentities($_POST['e-mail']);
            $registerModel = new RegisterModel($firstname, $lastname, $password, $gender, $email);
            $registerModel->register();
            header('Location: index.php?page=login');
        }
    }
}
