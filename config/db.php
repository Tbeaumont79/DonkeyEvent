<?php

class Db
{
    public $pdo;

    public function __construct()
    {
        $this->pdo = new PDO('mysql:host=localhost;dbname=donkeyevent', 'root', '');
    }
}
