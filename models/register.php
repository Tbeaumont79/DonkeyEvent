<?php
require_once("models/model.php");
class RegisterModel extends Model
{
    private $firstname = "";
    private $lastname = "";
    private $password = "";
    private $gender = "";
    private $email = "";
    private $tel = "";
    private $role_id = 0;
    public function __construct($firstname, $lastname, $password, $gender, $email)
    {
        parent::__construct();
        $this->setFirstname($firstname);
        $this->setLastname($lastname);
        $this->setPassword($password);
        $this->setGender($gender);
        $this->setEmail($email);
    }
    private function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    private function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

    private function setPassword($password)
    {
        $this->password = $password;
    }

    private function setGender($gender)
    {
        $this->gender = $gender;
    }

    private function setEmail($email)
    {
        $this->email = $email;
    }
    private function getFirstname()
    {
        return $this->firstname;
    }

    private function getLastname()
    {
        return $this->lastname;
    }

    private function getPassword()
    {
        return $this->password;
    }

    private function getGender()
    {
        return $this->gender;
    }

    private function getEmail()
    {
        return $this->email;
    }


    public function register()
    {
        $hashedPassword = password_hash($this->getPassword(), PASSWORD_DEFAULT);
        $sql = "INSERT INTO roles (name) VALUES ('Member')";
        $stmt = $this->pdo->prepare($sql);
        $result = $stmt->execute();
        if (!$result) {
            throw new Exception("registerModel: Error adding new role");
        }
        $this->role_id = $this->pdo->lastInsertId();
        
        $sql = "INSERT INTO users (firstname, lastname, password, gender, email, role_id) VALUES (:firstname, :lastname, :password, :gender, :email, :role_id)";
        $stmt = $this->pdo->prepare($sql);
        $result = $stmt->execute([
            'firstname' => $this->getFirstname(),
            'lastname' => $this->getLastname(),
            'password' => $hashedPassword,
            'gender' => $this->getGender(),
            'email' => $this->getEmail(),
            'role_id' => $this->role_id
        ]);
        if (!$result) {
            throw new Exception("registerModel: Error adding new user");
        }
        session_start();
        $_SESSION['user_id'] = $this->pdo->lastInsertId();
    }
}
