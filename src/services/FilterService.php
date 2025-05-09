<?php

namespace Thibaultbeaumont\DonkeyEvent\Services;

use Thibaultbeaumont\DonkeyEvent\Models\EventModel;
use Thibaultbeaumont\DonkeyEvent\Models\CityModel;
use Thibaultbeaumont\DonkeyEvent\Models\CategoryModel;

class FilterService
{
    private EventModel $eventModel;
    private CityModel $cityModel;
    private CategoryModel $categoryModel;

    public function __construct(EventModel $eventModel, CityModel $cityModel, CategoryModel $categoryModel)
    {
        $this->eventModel = $eventModel;
        $this->cityModel = $cityModel;
        $this->categoryModel = $categoryModel;
    }

    public function getCities(): array
    {
        return $this->cityModel->read();
    }
    public function getCategories(): array
    {
        return $this->categoryModel->read();
    }
    public function getFilterData(array $filters): array
    {
        return $this->eventModel->findEventByFilters(htmlentities($filters['city']), htmlentities($filters['category']), $filters['date_event']);
    }
}
