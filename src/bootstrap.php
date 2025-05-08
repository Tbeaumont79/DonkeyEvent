<?php

use Thibaultbeaumont\DonkeyEvent\Models\UserModel;
use Thibaultbeaumont\DonkeyEvent\Models\RoleModel;
use Thibaultbeaumont\DonkeyEvent\Services\UserService;
use Thibaultbeaumont\DonkeyEvent\Validators\UserValidator;

try {
    $pdo = new PDO('mysql:host=localhost:3306;dbname=donkeyevent', 'root', '');
} catch (Exception $e) {
    die('Error: ' . $e->getMessage());
}

$userModel = new UserModel($pdo);
$roleModel = new RoleModel($pdo);

$userValidator = new UserValidator();

$userService = new UserService($userModel, $roleModel);

return [
    'pdo' => $pdo,
    'userModel' => $userModel,
    'userService' => $userService,
    'userValidator' => $userValidator,
];
