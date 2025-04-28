<?php
class LoginModel extends Model
{
    private $email;
    private $password;

    public function __construct($email, $password)
    {
        $this->setEmail($email);
        $this->setPassword($password);
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }
    public function getEmail()
    {
        return $this->email;
    }

    public function login()
    {
        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            'email' => $this->email
        ]);
        $user = $stmt->fetch();
        if (!$user) {
            throw new Exception("User not found");
        }
        if (!password_verify($this->password, $user['password'])) {
            throw new Exception("Invalid username or password");
        }
        return $user;
    }
}
