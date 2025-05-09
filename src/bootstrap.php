<?php

use Thibaultbeaumont\DonkeyEvent\Models\UserModel;
use Thibaultbeaumont\DonkeyEvent\Models\RoleModel;
use Thibaultbeaumont\DonkeyEvent\Models\CityModel;
use Thibaultbeaumont\DonkeyEvent\Models\CategoryModel;
use Thibaultbeaumont\DonkeyEvent\Models\EventModel;
use Thibaultbeaumont\DonkeyEvent\Models\BookingModel;
use Thibaultbeaumont\DonkeyEvent\Models\BookedEventsModel;
use Thibaultbeaumont\DonkeyEvent\Services\FilterService;
use Thibaultbeaumont\DonkeyEvent\Services\BookingService;
use Thibaultbeaumont\DonkeyEvent\Validators\FilterValidator;
use Thibaultbeaumont\DonkeyEvent\Services\UserService;
use Thibaultbeaumont\DonkeyEvent\Validators\UserValidator;

try {
    $pdo = new PDO('mysql:host=localhost:3306;dbname=donkeyevent', 'root', '');
} catch (Exception $e) {
    die('Error: ' . $e->getMessage());
}
if (!isset($_SESSION)) {
    session_start();
}

$userModel = new UserModel($pdo);
$roleModel = new RoleModel($pdo);
$cityModel = new CityModel($pdo);
$categoryModel = new CategoryModel($pdo);
$eventModel = new EventModel($pdo);
$bookingModel = new BookingModel($pdo);
$bookedEventsModel = new BookedEventsModel($pdo);
$filterValidator = new FilterValidator();
$userValidator = new UserValidator();

$filterService = new FilterService($eventModel, $cityModel, $categoryModel);
$userService = new UserService($userModel, $roleModel);
$bookingService = new BookingService($bookingModel, $bookedEventsModel);
return [
    'pdo' => $pdo,
    'userModel' => $userModel,
    'roleModel' => $roleModel,
    'cityModel' => $cityModel,
    'categoryModel' => $categoryModel,
    'eventModel' => $eventModel,
    'bookingModel' => $bookingModel,
    'bookedEventsModel' => $bookedEventsModel,
    'filterService' => $filterService,
    'userService' => $userService,
    'bookingService' => $bookingService,
    'filterValidator' => $filterValidator,
    'userValidator' => $userValidator,
];
