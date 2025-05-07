<?php

require_once(__DIR__ . '/../src/models/Model.php');
require_once(__DIR__ . '/../src/models/UserModel.php');
require_once(__DIR__ . '/../config/db.php');
require_once(__DIR__ . '/../vendor/autoload.php');

use PHPUnit\Framework\TestCase;

final class UserModelTest extends TestCase
{
    public function  testreadTest(): void
    {
        $userModel = new UserModel();
        $user = $userModel->read(1);
        $this->assertSame(1, $user);
    }
}
