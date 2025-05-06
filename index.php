<?php
if (!session_start()) {
    session_start();
}
require_once('controllers/Controller.php');

require_once('controllers/ControllerRegister.php');
require_once('controllers/ControllerLogin.php');
require_once('controllers/ControllerFilters.php');
require_once('controllers/ControllerEvent.php');
require_once('controllers/ControllerBooking.php');
require_once('controllers/ControllerBookedEvents.php');
require_once('controllers/ControllerAccount.php');
if (!isset($_GET['page'])) {

    header('Location: index.php?page=login');
}
$controller = Controller::chooseCtrl();
$controller->start();
