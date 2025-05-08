<?php

namespace Thibaultbeaumont\DonkeyEvent\Controllers;

class ControllerLogout extends Controller
{
    public function __construct() {}

    public function start(): void
    {
        if (isset($_SESSION['user'])) {
            session_destroy();
        }
    }
}
