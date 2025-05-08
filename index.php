<?php
require_once __DIR__ . '/vendor/autoload.php';

if (!session_start()) {
    session_start();
}

use Thibaultbeaumont\DonkeyEvent\Controllers\Controller;

if (!isset($_GET['page']) || empty($_SESSION['user'])) {
    header('Location: index.php?page=login');
}

$controller = Controller::chooseCtrl();
$controller->start();
