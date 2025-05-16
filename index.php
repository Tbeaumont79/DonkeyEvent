<?php
require_once __DIR__ . '/vendor/autoload.php';

$container = require_once(__DIR__ . '/src/bootstrap.php');

use Thibaultbeaumont\DonkeyEvent\Controllers\ControllerRegister;
use Thibaultbeaumont\DonkeyEvent\Controllers\ControllerLogin;
use Thibaultbeaumont\DonkeyEvent\Controllers\ControllerFilters;
use Thibaultbeaumont\DonkeyEvent\Controllers\ControllerEvent;
use Thibaultbeaumont\DonkeyEvent\Controllers\ControllerBooking;
use Thibaultbeaumont\DonkeyEvent\Controllers\ControllerBookedEvents;
use Thibaultbeaumont\DonkeyEvent\Controllers\ControllerAccount;
use Thibaultbeaumont\DonkeyEvent\Controllers\ControllerLogout;

use function PHPUnit\Framework\isEmpty;

$routes = [
    'register' => fn() => new ControllerRegister($container['userService'], $container['userValidator']),
    'login' => fn() => new ControllerLogin($container['userService'], $container['userValidator']),
    'filters' => fn() => new ControllerFilters($container['filterService'], $container['filterValidator']),
    'events' => fn() => new ControllerEvent($container['eventModel']),
    'booking' => fn() => new ControllerBooking($container['bookingService']),
    'bookedEvents' => fn() => new ControllerBookedEvents($container['bookingService']),
    'account' => fn() => new ControllerAccount(),
    'logout' => fn() => new ControllerLogout()
];
$page = $_GET['page'] ?? 'login';
$controller = $routes[$page] ?? $routes['login'];
$controller = !$_SESSION && !$routes['register'] || (!isset($_SESSION) && isEmpty($_SESSION)) && $routes['register'] ? $routes['login'] : $routes[$page];
$controller = $controller();
$controller->start();
