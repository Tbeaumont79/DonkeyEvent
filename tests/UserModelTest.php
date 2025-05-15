<?php

require_once(__DIR__ . '/../vendor/autoload.php');

use Thibaultbeaumont\DonkeyEvent\Models\UserModel;
use PHPUnit\Framework\TestCase;

final class UserModelTest extends TestCase
{
    public function  testreadUser(): void
    {
        $container = require_once(__DIR__ . '/../src/bootstrap.php');
        $userModel = new UserModel($container['pdo']);
        $user = $userModel->read(1);

        $this->assertNotEmpty($user, "User should not be empty");
        $this->assertArrayHasKey('id', $user, "User should have an id");
        $this->assertArrayHasKey('firstname', $user, "User should have a firstname");
        $this->assertArrayHasKey('lastname', $user, "User should have a lastname");
        $this->assertArrayHasKey('email', $user, "User should have an email");
        $this->assertArrayHasKey('gender', $user, "User should have a gender");
        $this->assertArrayHasKey('role_id', $user, "User should have a role_id");
        $this->assertArrayHasKey('password', $user, "User should have a password");
    }
    
}
