<?php

namespace Thibaultbeaumont\DonkeyEvent\Controllers;

use Thibaultbeaumont\DonkeyEvent\Models\EventModel;

class ControllerEvent extends Controller
{
    private EventModel $eventsModel;
    public function __construct(EventModel $eventsModel)
    {
        $this->eventsModel = $eventsModel;
    }

    public function start()
    {
        if (!isset($_POST['city']) || !isset($_POST['date']) || !isset($_POST['category'])) {
            header('Location: index.php?page=filters');
        } else {
            $events = $this->eventsModel->findEventByFilters(htmlentities($_POST['city']), htmlentities($_POST['category']), $_POST['date']);
            require_once(__DIR__ . '/../views/EventsView.php');
        }
    }
}
