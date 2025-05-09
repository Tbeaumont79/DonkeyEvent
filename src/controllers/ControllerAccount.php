<?php

namespace Thibaultbeaumont\DonkeyEvent\Controllers;

class ControllerAccount
{
    public function __construct()
    {
    }

    public function start()
    {
        require_once(__DIR__ . '/../views/AccountView.php');
    }
}
