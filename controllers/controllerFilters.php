<?php

require_once __DIR__ . '/../models/FiltersModel.php';
class ControllerFilters
{
    public function __construct() {}

    public function start()
    {
        $filtersModel = new FiltersModel();
        $cities = $filtersModel->findAllCities();
        $dates = $filtersModel->findEventDates();
        $categories = $filtersModel->findCategories();
        require_once('views/filters.php');
    }
}
