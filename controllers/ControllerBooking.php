<?php

require_once(__DIR__ . '/../models/BookingModel.php');
class ControllerBooking
{
    public function __construct() {}

    public function start()
    {
        if (!$_GET['event_id']) {
            header('Location: index.php?page=events');
        } else {
            $event_id = $_GET['event_id'];
            require_once(__DIR__ . '/../views/booking.php');
        }
    }
}
