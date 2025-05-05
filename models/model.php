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
}
