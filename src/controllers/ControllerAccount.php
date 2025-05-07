<?php

namespace Thibaultbeaumont\DonkeyEvent\Controllers;

class ControllerAccount extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function start()
    {
        if (!isset($_SESSION['user'])) {
            header('Location: index.php?page=login');
        } else {
            require_once(__DIR__ . '/../views/AccountView.php');
        }
    }
}
