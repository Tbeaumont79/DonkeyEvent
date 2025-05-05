<?php
require_once('models/filters.php');
class ControllerFilters
{
    private $user;
    public function __construct()
    {
        
    }
    public function start()
    {
        print_r("je passe ici 0 : controller ");
        if (!isset($_POST['city']) || !isset($_POST['date']) || !isset($_POST['category'])) {
            require_once('views/filters.php');
        } else {
            print_r("je passe ici 1 : controller ");
            $filtersModel = new FiltersModel($_POST['city'], $_POST['date'], $_POST['category']);
            $this->user = $filtersModel->filters();
            if (!isset($this->user)) {
                throw new Exception("Error adding new user");
            }
            return $this->user;
        }
    }
}