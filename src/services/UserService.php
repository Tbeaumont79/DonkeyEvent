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
        return $this->userModel->create(htmlentities($user['firstname']), htmlentities($user['lastname']), htmlentities($user['password']), htmlentities($user['gender']), htmlentities($user['email']), $roleId);
    }
    public function login(string $email, string $password): bool
    {
        $user = $this->userModel->readByEmail($email);
        if ($user && password_verify($password, $user['password'])) {
            session_start();
            $_SESSION['user'] = $user;
            return true;
        }
        return false;
    }
}
