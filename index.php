<?php
require_once __DIR__ . '/vendor/autoload.php';

if (!session_start()) {
    session_start();
}

use Thibaultbeaumont\DonkeyEvent\Controllers\Controller;
use Thibaultbeaumont\DonkeyEvent\Controllers\ControllerRegister;
use Thibaultbeaumont\DonkeyEvent\Controllers\ControllerLogin;
use Thibaultbeaumont\DonkeyEvent\Controllers\ControllerFilters;
use Thibaultbeaumont\DonkeyEvent\Controllers\ControllerEvent;
use Thibaultbeaumont\DonkeyEvent\Controllers\ControllerBooking;
use Thibaultbeaumont\DonkeyEvent\Controllers\ControllerBookedEvents;
use Thibaultbeaumont\DonkeyEvent\Controllers\ControllerAccount;

if (!isset($_GET['page'])) {
    header('Location: index.php?page=login');
}

$controller = Controller::chooseCtrl();
$controller->start();
