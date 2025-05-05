<?php

class Controller
{
    public function __construct() {}

    static public function chooseCtrl()
    {
        switch ($_GET['page']) {
            case 'register':
                $controller = new ControllerRegister();
                break;
            case 'login':
                $controller = new ControllerLogin();
                break;
                // case 'logout':
                //     require_once('controllers/controllerLogout.php');
                //     $controller = new ControllerLogout();
                break;
            default:
                require_once('controllers/controllerLogin.php');
                $controller = new ControllerLogin();
        }
        return $controller;
    }
}
