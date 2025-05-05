<?php

require_once __DIR__ . '../models/FiltersModel.php';
class ControllerFilters
{
    public function __construct() {}

    public function start()
    {
        if (!isset($_POST['city']) || !isset($_POST['date']) || !isset($_POST['category']))
            require_once('views/filters.php');
        else {
            $city = htmlentities($_POST['city']);
            $date = htmlentities($_POST['date']);
            $category = htmlentities($_POST['category']);
            $filtersModel = new FiltersModel($city, $date, $category);
            header('Location: views/liste.php');
        }
    }
}
