<?php
require_once __DIR__ . '/vendor/autoload.php';

$container = require_once(__DIR__ . '/src/bootstrap.php');

use Thibaultbeaumont\DonkeyEvent\Controllers\ControllerRegister;
use Thibaultbeaumont\DonkeyEvent\Controllers\ControllerLogin;

$routes = [
    'register' => fn() => new ControllerRegister($container['userService'], $container['userValidator']),
    'login' => fn() => new ControllerLogin($container['userService'], $container['userValidator']),
];
$page = $_GET['page'] ?? 'login';
$controller = $routes[$page] ?? $routes['login'];
$controller = $controller();
$controller->start();
