<?php
require_once("models/model.php");
class FiltersModel extends Model
{
    private $city = "";
    private $date = "";
    private $category = "";
    private $role_id = 0;
    public function __construct($city, $date, $category)
    {
        $this->setCity($city);
        $this->setDate($date);
        $this->setCategory($category);
    }
    private function setCity($city)
    {
        $this->city = $city;
    }

    private function setDate($date)
    {
        $this->date = $date;
    }

    private function setCategory($category)
    {
        $this->category = $category;
    }

    private function setRoleId($role_id)
    {
        $this->role_id = $role_id;
    }

    private function getCity()
    {
        return $this->city;
    }

    private function getDate()
    {
        return $this->date;
    }

    private function getCategory()
    {
        return $this->category;
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
    
    public function filter()
    {
        print_r("je passe ici 2 : filterModel");
        
        
   
    }
}
