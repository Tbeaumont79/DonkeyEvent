<?php

namespace Thibaultbeaumont\DonkeyEvent\Controllers;

use Thibaultbeaumont\DonkeyEvent\Models\CityModel;
use Thibaultbeaumont\DonkeyEvent\Models\CategoryModel;
use Thibaultbeaumont\DonkeyEvent\Models\EventModel;

class ControllerFilters extends Controller
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
        require_once(__DIR__ . '/../views/FiltersView.php');
    }
}
