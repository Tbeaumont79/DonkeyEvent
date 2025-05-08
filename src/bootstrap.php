<?php

use Thibaultbeaumont\DonkeyEvent\Models\UserModel;
use Thibaultbeaumont\DonkeyEvent\Models\RoleModel;
use Thibaultbeaumont\DonkeyEvent\Models\CityModel;
use Thibaultbeaumont\DonkeyEvent\Models\CategoryModel;
use Thibaultbeaumont\DonkeyEvent\Models\EventModel;
use Thibaultbeaumont\DonkeyEvent\Services\FilterService;
use Thibaultbeaumont\DonkeyEvent\Validators\FilterValidator;
use Thibaultbeaumont\DonkeyEvent\Services\UserService;
use Thibaultbeaumont\DonkeyEvent\Validators\UserValidator;

try {
    $pdo = new PDO('mysql:host=localhost:3306;dbname=donkeyevent', 'root', '');
} catch (Exception $e) {
    die('Error: ' . $e->getMessage());
}

$userModel = new UserModel($pdo);
$roleModel = new RoleModel($pdo);
$cityModel = new CityModel($pdo);
$categoryModel = new CategoryModel($pdo);
$eventModel = new EventModel($pdo);

$filterValidator = new FilterValidator();
$userValidator = new UserValidator();

$filterService = new FilterService($eventModel, $cityModel, $categoryModel);
$userService = new UserService($userModel, $roleModel);

return [
    'pdo' => $pdo,
    'userModel' => $userModel,
    'roleModel' => $roleModel,
    'cityModel' => $cityModel,
    'categoryModel' => $categoryModel,
    'eventModel' => $eventModel,
    'filterService' => $filterService,
    'userService' => $userService,
    'filterValidator' => $filterValidator,
    'userValidator' => $userValidator,
];
