<?php

namespace Thibaultbeaumont\DonkeyEvent\Models;

class BookingModel
{
    private int $categoryId;
    private \PDO $pdo;
    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }
    public function setCategoryId($categoryId)
    {
        $this->categoryId = $categoryId;
    }
    public function getCategoryId()
    {
        return $this->categoryId;
    }
    public function getCategoryName(int $categoryId): string
    {
        $query = "SELECT name FROM category WHERE id = :category_id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':category_id', $categoryId, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchColumn();
    }
    public function getEventDetails(int $eventId): array
    {
        $query = "SELECT * FROM events WHERE id = :event_id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':event_id', $eventId, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function getAllOptions(int $eventId): array
    {
        $query = "SELECT * FROM options where event_id = :event_id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':event_id', $eventId, \PDO::PARAM_INT);
        $stmt->execute();
        return  $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}
