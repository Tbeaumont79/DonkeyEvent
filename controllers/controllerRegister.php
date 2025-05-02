<?php
require_once('models/register.php');
class ControllerRegister
{
    private $user;
    public function __construct() {}
    public function start()
    {
        if (!isset($_POST['firstname']) || !isset($_POST['lastname']) || !isset($_POST['password']) || !isset($_POST['gender']) || !isset($_POST['e-mail'])) {
            require_once('views/register.php');
        } else {
            $registerModel = new RegisterModel($_POST['firstname'], $_POST['lastname'], $_POST['password'], $_POST['gender'], $_POST['e-mail']);
            $this->user = $registerModel->register();
            if (!isset($this->user)) {
                throw new Exception("Error adding new user");
            }
            return $this->user;
        }
    }
}
