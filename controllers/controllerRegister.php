<?php
require_once('models/register.php');
class ControllerRegister
{
    public function __construct() {}
    public function start()
    {
        if (!isset($_POST['firstname']) || !isset($_POST['lastname']) || !isset($_POST['password']) || !isset($_POST['gender']) || !isset($_POST['e-mail']))
            require_once('views/register.php');

        $registerModel = new RegisterModel($_POST['firstname'], $_POST['lastname'], $_POST['password'], $_POST['gender'], $_POST['e-mail']);
        $registerModel->register();
        
    }
}
