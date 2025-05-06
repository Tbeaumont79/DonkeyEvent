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
            case 'filters':
                $controller = new ControllerFilters();
                break;
            case 'events':
                $controller = new ControllerEvent();
                break;
            case 'booking':
                $controller = new ControllerBooking();
                break;

            // case 'logout':
            //     require_once('controllers/controllerLogout.php');
            //     $controller = new ControllerLogout();
            //break;
            default:
                $controller = new ControllerLogin();
        }
        return $controller;
    }
}
