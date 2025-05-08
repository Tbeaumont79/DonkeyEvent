<?php

namespace Thibaultbeaumont\DonkeyEvent\Services;

use Thibaultbeaumont\DonkeyEvent\Models\UserModel;
use Thibaultbeaumont\DonkeyEvent\Models\RoleModel;

class UserService
{
    private UserModel $userModel;
    private RoleModel $roleModel;

    public function __construct(UserModel $userModel, RoleModel $roleModel)
    {
        $this->userModel = $userModel;
        $this->roleModel = $roleModel;
    }
    public function createUserRole(string $role): int
    {
        $roleId = $this->roleModel->create($role);
        return $roleId;
    }
    public function register(array $user, string $userRole): int
    {
        $roleId = $this->createUserRole($userRole);
        return $this->userModel->create($user['firstname'], $user['lastname'], $user['email'], $user['gender'], $user['password'], $roleId);
    }
    public function login(string $email, string $password): bool
    {
        $user = $this->userModel->readByEmail($email);
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user'] = $user;
            return true;
        }
        return false;
    }
}
