<?php
if (!session_start()) {
    session_start();
}
require_once('controllers/controller.php');
require_once('controllers/controllerRegister.php');
require_once('controllers/controllerLogin.php');
if (!isset($_GET['page'])) {
    header('Location: index.php?page=login');
}
$controller = Controller::chooseCtrl();
$controller->start();
