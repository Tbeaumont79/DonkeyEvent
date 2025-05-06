<?php
require_once __DIR__ . '/../config/db.php';
class Model
{
    private $db;
    protected $pdo;
    public function __construct()
    {
        $this->db = new Db();
        $this->pdo = $this->db->getPdo();
    }
    protected function getIdByName($table, $name)
    {
        $query = "SELECT id FROM $table WHERE name = :name";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result) {
            return $result['id'];
        } else {
            return null;
        }
    }
}
