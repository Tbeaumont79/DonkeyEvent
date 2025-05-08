<?php

namespace Thibaultbeaumont\DonkeyEvent\Controllers;

use Thibaultbeaumont\DonkeyEvent\validators\UserValidator;
use Thibaultbeaumont\DonkeyEvent\Services\UserService;
use Thibaultbeaumont\DonkeyEvent\Models\UserModel;

class Controller
{
    public function __construct() {}

    static public function chooseCtrl()
    {
        switch ($_GET['page']) {
            // case 'register': {
            //         $userValidator = new UserValidator();
            //         $userModel = new UserModel();
            //         $userService = new UserService($userModel);
            //         $controller = new ControllerRegister($userValidator, $userService);
            //         break;
            //     }

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
            case 'bookedevents':
                $controller = new ControllerBookedEvents();
                break;
            case 'account':
                $controller = new ControllerAccount();
                break;
            case 'logout':
                $controller = new ControllerLogout();
                break;
            // case 'logout':
            //     $controller = new ControllerLogout();
            //     break;
            default:
                $controller = new ControllerLogin();
        }
        return $controller;
    }
}
