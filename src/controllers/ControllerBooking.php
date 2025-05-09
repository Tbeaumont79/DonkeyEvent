<?php

namespace Thibaultbeaumont\DonkeyEvent\Controllers;

use Thibaultbeaumont\DonkeyEvent\Services\BookingService;

class ControllerBooking
{
    private BookingService $bookingService;
    public function __construct(BookingService $bookingModel)
    {
        $this->bookingService = $bookingModel;
    }

    public function start()
    {

        if (!$_SERVER['REQUEST_METHOD'] === 'POST' && !$_GET['event_id']) {
            header('Location: index.php?page=events');
        } else {
            $event_id = $_GET['event_id'];
            $eventDetails = $this->bookingService->getEventDetails($event_id);
            $categoryName = $this->bookingService->getCategoryName($event_id);
            $options = $this->bookingService->getAllOptions($event_id);
            require_once(__DIR__ . '/../views/BookingView.php');
        }
    }
}
