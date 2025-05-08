<?php
require_once __DIR__ . '/vendor/autoload.php';

$container = require_once(__DIR__ . '/src/bootstrap.php');

use Thibaultbeaumont\DonkeyEvent\Controllers\ControllerRegister;
use Thibaultbeaumont\DonkeyEvent\Controllers\ControllerLogin;
use Thibaultbeaumont\DonkeyEvent\Controllers\ControllerFilters;

$routes = [
    'register' => fn() => new ControllerRegister($container['userService'], $container['userValidator']),
    'login' => fn() => new ControllerLogin($container['userService'], $container['userValidator']),
    'filters' => fn() => new ControllerFilters($container['filterService'], $container['filterValidator']),
];
$page = $_GET['page'] ?? 'login';
$controller = $routes[$page] ?? $routes['login'];
$controller = $controller();
$controller->start();
