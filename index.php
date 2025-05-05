<?php
session_start();
require_once('controllers/controller.php');
require_once('controllers/controllerRegister.php');
require_once('controllers/controllerLogin.php');

$controller = Controller::chooseCtrl();
$controller->start();
