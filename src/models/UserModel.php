<?php

namespace Thibaultbeaumont\DonkeyEvent\Models;

interface UserCrudInterface
{
    public function read($user_id);
    public function readByEmail($email);
    public function create($firstname, $lastname, $password, $gender, $email, $role_id);
    public function update();
    public function delete($user_id);
}
class UserModel implements UserCrudInterface
{
    private \PDO $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }
    public function read($user_id)
    {
        $query = "SELECT * FROM users WHERE id = :user_id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':user_id', $user_id, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
    public function readByEmail($email)
    {
        $query = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':email', $email, \PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
    public function create($firstname, $lastname, $password, $gender, $email, $role_id): int
    {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (firstname, lastname, password, gender, email, role_id) VALUES (:firstname, :lastname, :password, :gender, :email, :role_id)";
        $stmt = $this->pdo->prepare($sql);
        $result = $stmt->execute([
            'firstname' => $firstname,
            'lastname' => $lastname,
            'password' => $hashedPassword,
            'gender' => $gender,
            'email' => $email,
            'role_id' => $role_id
        ]);
        if (!$result) {
            throw new \Exception("registerModel: Error adding new user");
        }
        return (int)$this->pdo->lastInsertId();
    }
    public function update() {}
    public function delete($user_id) {}
    // Implement update logic here
}
