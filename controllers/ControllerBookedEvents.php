<?php

require_once(__DIR__ . '/../models/BookedEventsModel.php');
class ControllerBookedEvents extends Controller
{
    public function __construct() {}

    public function start()
    {
        $bookedEventsModel = new BookedEventsModel($_SESSION['user']);
        if (isset($_GET['event_id'])) {
            $bookedEventsModel->delete($_GET['event_id']);
        }
        if (isset($_POST['event_id'])) {
            $eventId = $_POST['event_id'];
            $eventDate = $_POST['event_date'];
            $bookedEvents = $bookedEventsModel->create($eventId, $eventDate);
        }
        $bookedEvents = $bookedEventsModel->read();
        require_once(__DIR__ . '/../views/BookedEventsView.php');
    }
}
