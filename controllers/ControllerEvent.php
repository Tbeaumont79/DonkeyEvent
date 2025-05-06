<?php

require_once(__DIR__ . '/../models/EventModel.php');
class ControllerEvent
{
    public function __construct() {}

    public function start()
    {
        if (!isset($_POST['city']) || !isset($_POST['date']) || !isset($_POST['category'])) {
            header('Location: index.php?page=filters');
        } else {
            $eventsModel = new EventModel($_POST['city'], $_POST['date'], $_POST['category']);
            $events = $eventsModel->getEvents();
            require_once(__DIR__ . '/../views/events.php');
        }
    }
}
