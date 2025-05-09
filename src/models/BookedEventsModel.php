<?php

namespace Thibaultbeaumont\DonkeyEvent\Models;

interface BookedEventsCrud
{
    public function read(int $user_id): array;
    public function create(int $event_id, int $user_id,  $event_date);
    public function update();
    public function delete(int $event_id, int $user_id): void;
}

class BookedEventsModel implements BookedEventsCrud
{
    private \PDO $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function read(int $user_id): array
    {
        $query = "SELECT bookedEvents.*, events.name AS event_name, events.date_event AS event_date, city.name AS city_name
                  FROM bookedEvents
                  JOIN events ON bookedEvents.event_id = events.id
                  JOIN city ON events.city_id = city.id
                  WHERE bookedEvents.user_id = :user_id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':user_id', $user_id, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function create(int $event_id, int $user_id, $event_date): void
    {
        $query = "INSERT INTO bookedEvents (user_id, event_id, booking_date) VALUES (:user_id, :event_id, :booking_date)";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':user_id', $_SESSION['user']['id'], \PDO::PARAM_INT);
        $stmt->bindParam(':event_id', $event_id, \PDO::PARAM_INT);
        $stmt->bindParam(':booking_date', $event_date, \PDO::PARAM_STR);
        $stmt->execute();
    }
    public function update() {}
    public function delete(int $event_id, int $user_id): void
    {
        $user_id = $_SESSION['user']['id'];
        $query = "DELETE FROM bookedEvents WHERE user_id = :user_id AND event_id = :event_id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':user_id', $user_id, \PDO::PARAM_INT);
        $stmt->bindParam(':event_id', $event_id, \PDO::PARAM_INT);
        $stmt->execute();
    }
}
