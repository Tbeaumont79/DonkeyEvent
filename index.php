<?php
session_start();
require_once('controllers/controllerRegister.php');

$registerController = new ControllerRegister();
$registerController->start();
header('Location: views/register.php');
echo isset($_SESSION['user']) ? 'Bonjour' . $_SESSION['user'] : 'Bonjour';
