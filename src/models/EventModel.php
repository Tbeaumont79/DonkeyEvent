<?php

namespace Thibaultbeaumont\DonkeyEvent\Models;

use DateTime;

interface EventCrud
{
    public function create();
    public function read(): array;
    public function update();
    public function delete();
}
class EventModel implements EventCrud
{
    private \PDO $pdo;
    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }
    protected function getIdByName($table, $name)
    {
        $query = "SELECT id FROM $table WHERE name = :name";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->execute();
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        if ($result) {
            return $result['id'];
        } else {
            return null;
        }
    }
    public function findEventsByDate(DateTime $date): array
    {
        $query = "SELECT * FROM events WHERE date_event = :date_event";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':date_event', $date);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function findEventByFilters(string $city, string $category, DateTime $date): array
    {
        $query = "SELECT * FROM events WHERE city = :city AND category = :category AND date_event = :date_event";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':city', $city);
        $stmt->bindParam(':category', $category);
        $stmt->bindParam(':date_event', $date);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function read(): array
    {
        $query = "SELECT * FROM events";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function create() {}
    public function update() {}
    public function delete() {}
}
