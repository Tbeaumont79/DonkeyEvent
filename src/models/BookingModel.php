<?php

namespace Thibaultbeaumont\DonkeyEvent\Models;

class BookingModel
{
    private int $category_id;
    private \PDO $pdo;
    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }
    public function setCategoryId($category_id)
    {
        $this->category_id = $category_id;
    }
    public function getCategoryId()
    {
        return $this->category_id;
    }
    public function getCategoryName(int $event_id): string
    {
        $query = "SELECT name FROM category WHERE id = :category_id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':category_id', $event_id, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchColumn();
    }
    public function getEventDetails(int $event_id): array
    {
        $query = "SELECT * FROM events WHERE id = :event_id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':event_id', $event_id, \PDO::PARAM_INT);
        $stmt->execute();
        $event = $stmt->fetch(\PDO::FETCH_ASSOC);

        $this->setCategoryId($event['category_id']);
        return $event;
    }

    public function getAllOptions(int $event_id): array
    {
        $query = "SELECT * FROM options where event_id = :event_id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':event_id', $event_id, \PDO::PARAM_INT);
        $stmt->execute();
        return  $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}
