<?php

require_once(__DIR__ . '/../models/CityModel.php');
require_once(__DIR__ . '/../models/CategoryModel.php');
require_once(__DIR__ . '/../models/EventModel.php');
class ControllerFilters
{
    public function __construct() {}

    public function start()
    {
        $city = new CityModel();
        $cities = $city->read();
        $category = new CategoryModel();
        $categories = $category->read();
        $event = new EventModel(null, null, null);
        $dates = $event->findEventsByDate();
        require_once('views/filters.php');
    }
}
