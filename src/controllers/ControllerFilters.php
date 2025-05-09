<?php

namespace Thibaultbeaumont\DonkeyEvent\Controllers;

use Thibaultbeaumont\DonkeyEvent\Validators\FilterValidator;
use Thibaultbeaumont\DonkeyEvent\Services\FilterService;

class ControllerFilters
{
    private FilterValidator $filterValidator;
    private FilterService $filterService;
    private array $filters = [];
    private array $errors = [];

    public function __construct(FilterService $filterService, FilterValidator $filterValidator)
    {
        $this->filterValidator = $filterValidator;
        $this->filterService = $filterService;
    }
    public function start()
    {
        $cities = $this->filterService->getCities();
        $categories = $this->filterService->getCategories();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->errors = $this->filterValidator->validate($_POST);
            if (!empty($errors)) {
                $this->errors = $errors;
                require_once(__DIR__ . '/../views/FiltersView.php');
            }
            $this->filters = $this->filterService->getFilterData($_POST);
        }
        require_once(__DIR__ . '/../views/FiltersView.php');
    }
}
