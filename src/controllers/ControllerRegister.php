<?php

namespace Thibaultbeaumont\DonkeyEvent\Controllers;

use Thibaultbeaumont\DonkeyEvent\Models\UserModel;
use Thibaultbeaumont\DonkeyEvent\Models\RoleModel;

class ControllerRegister extends Controller
{
    public function __construct() {}
    public function start()
    {
        if (!isset($_POST['firstname']) || !isset($_POST['lastname']) || !isset($_POST['password']) || !isset($_POST['gender']) || !isset($_POST['e-mail']))
            require_once(__DIR__ . '/../views/RegisterView.php');
        else {
            $firstname = htmlentities($_POST['firstname']);
            $lastname = htmlentities($_POST['lastname']);
            $password = htmlentities($_POST['password']);
            $gender = htmlentities($_POST['gender']);
            $email = htmlentities($_POST['e-mail']);
            $role = new RoleModel();
            $role_id = $role->create('member');
            $user = new UserModel();
            $currentUser = $user->create($firstname, $lastname, $password, $gender, $email, $role_id);
            $_SESSION['user'] = $currentUser;
            header('Location: index.php?page=filters');
        }
    }
}
