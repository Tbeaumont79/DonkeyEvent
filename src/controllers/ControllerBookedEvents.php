<?php

namespace Thibaultbeaumont\DonkeyEvent\Controllers;

use Thibaultbeaumont\DonkeyEvent\services\BookingService;

class ControllerBookedEvents extends Controller
{
    private BookingService $bookingService;
    public function __construct(BookingService $bookingService)
    {
        $this->bookingService = $bookingService;
    }

    public function start()
    {
        if (isset($_GET['event_id'])) {
            $this->bookingService->deleteBookedEvent($_GET['event_id']);
        }
        if (isset($_POST['event_id'])) {
            $eventId = $_POST['event_id'];
            $eventDate = $_POST['event_date'];
            $this->bookingService->createBookedEvent($eventId, $eventDate);
        }
        $bookedEvents = $this->bookingService->getAllBookedEvent();
        require_once(__DIR__ . '/../views/BookedEventsView.php');
    }
}
