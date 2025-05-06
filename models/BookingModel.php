<?php
    class BookingModel extends Model {
        private $event_id;
        public function __construct($event_id) {
            parent::__construct();
            $this->event_id = $event_id;
        }
        public function getEventDetails(){
            $query = "SELECT * FROM events WHERE id = :event_id";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(':event_id', $this->event_id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
    }
?>