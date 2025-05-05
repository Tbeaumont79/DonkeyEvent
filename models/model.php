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


    private function getCurrentUser()
    {
        session_start();
        $id = $_SESSION['user'];
        $sql = "SELECT * FROM users WHERE user = :id";
        $stmt = $this->pdo->prepare($sql);
        $user = $stmt->execute([
            'id' => $id
        ]);
        return $user;
    }
}
