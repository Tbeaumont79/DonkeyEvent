<?php

namespace Thibaultbeaumont\DonkeyEvent\Services;

use Thibaultbeaumont\DonkeyEvent\Models\BookingModel;
use Thibaultbeaumont\DonkeyEvent\Models\BookedEventsModel;

class BookingService
{
    private BookingModel $bookingModel;
    private BookedEventsModel $bookedEventsModel;
    private int $categoryId;
    public function __construct(BookingModel $bookingModel, BookedEventsModel $bookedEventsModel)
    {
        $this->bookingModel = $bookingModel;
        $this->bookedEventsModel = $bookedEventsModel;
    }
    public function setCategoryId(int $categoryId)
    {
        $this->categoryId = $categoryId;
    }
    public function deleteBookedEvent(int $eventId)
    {
        $this->bookedEventsModel->delete($eventId, $_SESSION["user"]["id"] ?? null);
    }
    public function createBookedEvent(int $eventId, string $eventDate)
    {
        $this->bookedEventsModel->create($eventId, $_SESSION["user"]["id"] ?? null, $eventDate);
    }
    public function getAllBookedEvent(): array
    {
        return $this->bookedEventsModel->read($_SESSION["user"]["id"] ?? null);
    }
    public function getCategoryName(): string
    {
        return $this->bookingModel->getCategoryName($this->categoryId);
    }
    public function getAllOptions(int $eventId): array
    {
        return $this->bookingModel->getAllOptions($eventId);
    }
    public function getEventDetails(int $eventId)
    {
        $eventDetails = $this->bookingModel->getEventDetails($eventId);
        $this->setCategoryId($eventDetails['category_id']);
        return $eventDetails;
    }
}
