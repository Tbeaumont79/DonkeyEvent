<?php
class BookingModel extends Model
{
    private $event_id;
    private $category_id;
    public function __construct($event_id)
    {
        parent::__construct();
        $this->event_id = $event_id;
    }
    public function setCategoryId($category_id)
    {
        $this->category_id = $category_id;
    }
    public function getCategoryId()
    {
        return $this->category_id;
    }
    public function getCategoryName()
    {
        $query = "SELECT name FROM category WHERE id = :category_id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':category_id', $this->event_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchColumn();
    }
    public function getEventDetails()
    {
        $query = "SELECT * FROM events WHERE id = :event_id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':event_id', $this->event_id, PDO::PARAM_INT);
        $stmt->execute();
        $event = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$event) {
            throw new Exception("Event not found");
        }
        $this->setCategoryId($event['category_id']);
        return $event;
    }

    public function getAllOptions()
    {
        $query = "SELECT * FROM options where event_id = :event_id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':event_id', $this->event_id, PDO::PARAM_INT);
        $stmt->execute();
        $options = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (!$options) {
            throw new Exception("Options not found");
        }
        return $options;
    }
}
