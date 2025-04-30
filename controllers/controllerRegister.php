<?php
require_once('models/register.php');
class ControllerRegister
{
    private $user;
    public function start()
    {
        if (!isset($_POST['firstname']) || !isset($_POST['lastname']) || !isset($_POST['password']) || !isset($_POST['gender']) || !isset($_POST['e-mail']) || !isset($_POST['tel'])) {
            require_once('views/register.php');
        }
        $registerModel = new RegisterModel($_POST['firstname'], $_POST['lastname'], $_POST['password'], $_POST['gender'], $_POST['email'], $_POST['tel']);
        $this->user = $registerModel->register();
        if (!isset($this->user)) {
            throw new Exception("Error adding new user");
        }
        return $this->user;
    }
}
