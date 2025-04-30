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



    private function setRoleId($role_id)
    {
        $this->role_id = $role_id;
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



    private function getRoleId()
    {
        $sql = "SELECT role_id FROM users";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        if (!$stmt) {
            $this->setRoleId(1);
        }
        return $this->role_id;
    }
    public function register()
    {
        print_r("je passe ici 2 : registerModel");
        $hashedPassword = password_hash($this->getPassword(), PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (firstname, lastname, password, gender, email, role_id) VALUES (:firstname, :lastname, :password, :gender, :email, :role_id)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            'firstname' => $this->getFirstname(),
            'lastname' => $this->getLastname(),
            'password' => $hashedPassword,
            'gender' => $this->getGender(),
            'email' => $this->getEmail(),
            'role_id' => $this->getRoleId()
        ]);
        $user = $stmt->fetch();
        print_r('je passe ici 3 : ' . $user);
        if (!$user) {
            throw new Exception("registerModel: Error adding new user");
        }
        return $user;
    }
}
