<?php

namespace Thibaultbeaumont\DonkeyEvent\Controllers;

use Thibaultbeaumont\DonkeyEvent\Models\BookedEventsModel;

class ControllerBookedEvents extends Controller
{
    private BookedEventsModel $bookedEventsModel;
    public function __construct(BookedEventsModel $bookedEventsModel)
    {
        $this->bookedEventsModel = $bookedEventsModel;
    }

    public function start()
    {
        if (isset($_GET['event_id'])) {
            $this->bookedEventsModel->delete($_GET['event_id']);
        }
        if (isset($_POST['event_id'])) {
            $eventId = $_POST['event_id'];
            $eventDate = $_POST['event_date'];
            $bookedEvents = $this->bookedEventsModel->create($eventId, $eventDate);
        }
        $bookedEvents = $this->bookedEventsModel->read();
        require_once(__DIR__ . '/../views/BookedEventsView.php');
    }
}
