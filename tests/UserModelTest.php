<?php


require_once(__DIR__ . '/../vendor/autoload.php');
use Thibaultbeaumont\DonkeyEvent\Models\UserModel;

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
