<?php
class EventModel extends Model
{
    private $city;
    private $date;
    private $category;
    private $events;
    public function __construct($city, $date, $category)
    {
        parent::__construct();
        $this->city = $city;
        $this->date = $date;
        $this->category = $category;
    }

    public function findEventsByDate()
    {
        $query = "SELECT * FROM events WHERE date_event = :date_event";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':date_event', $this->date);
        $stmt->execute();
        $events = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $events;
    }
    public function getEvents()
    {
        if (!$this->findEventsByDate())
            return false;
        $cityId = $this->getIdByName('city', $this->city);
        $categoryId = $this->getIdByName('category', $this->category);
        $query = "SELECT e.*, c.name AS city_name, cat.name AS category_name
                  FROM events e
                  JOIN city c ON e.city_id = c.id
                  JOIN category cat ON e.category_id = cat.id
                  WHERE c.id = :city_id AND e.date_event = :date_event AND cat.id = :category_id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':city_id', $cityId);
        $stmt->bindParam(':date_event', $this->date);
        $stmt->bindParam(':category_id', $categoryId);
        $stmt->execute();
        $this->events = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $this->events;
    }
}
