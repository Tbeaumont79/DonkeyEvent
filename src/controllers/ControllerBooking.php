<?php

namespace Thibaultbeaumont\DonkeyEvent\Controllers;

use Thibaultbeaumont\DonkeyEvent\Models\BookingModel;

class ControllerBooking
{
    private BookingModel $bookingModel;
    public function __construct(BookingModel $bookingModel)
    {
        $this->bookingModel = $bookingModel;
    }

    public function start()
    {

        if (!$_SERVER['REQUEST_METHOD'] === 'POST' && !$_GET['event_id']) {
            header('Location: index.php?page=events');
        } else {
            $event_id = $_GET['event_id'];
            $eventDetails = $this->bookingModel->getEventDetails($event_id);
            $categoryName = $this->bookingModel->getCategoryName($event_id);
            $options = $this->bookingModel->getAllOptions($event_id);
            require_once(__DIR__ . '/../views/BookingView.php');
        }
    }
}
