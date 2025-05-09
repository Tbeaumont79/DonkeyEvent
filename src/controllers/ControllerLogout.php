<?php

namespace Thibaultbeaumont\DonkeyEvent\Controllers;

use function PHPUnit\Framework\isEmpty;

class ControllerLogout
{
    public function __construct() {}

    public function start(): void
    {

        if (isset($_SESSION['user']) && !isEmpty($_SESSION['user'])) {
            session_destroy();
            header('Location: index.php');
            exit();
        }
        header('Location: index.php');
    }
}
