<?php

namespace Thibaultbeaumont\DonkeyEvent\Models;
use PDO;
use Exception;

class Model
{
    public $pdo;

    public function __construct()
    {
        $this->pdo = $this->connectToDb();
    }

    public function getPdo()
    {
        return $this->pdo;
    }

    private function connectToDb()
    {
        try {
            $this->pdo = new PDO('mysql:host=localhost;dbname=donkeyevent', 'root', '');
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->pdo;
        } catch (Exception $e) {
            die('Error : ' . $e->getMessage());
        }
    }
}
