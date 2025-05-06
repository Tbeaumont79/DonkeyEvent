<?php
require_once("models/model.php");
class FiltersModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function findAllCities()
    {
        $query = "SELECT * FROM city WHERE id IN (SELECT MIN(id) FROM city GROUP BY name);";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        $cities = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $cities;
    }


    public function findEventDates()
    {
        $query = "SELECT date_event FROM events";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        $dates = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $dates;
    }
    public function findCategories()
    {
        $query = "SELECT name FROM category";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $categories;
    }
}
