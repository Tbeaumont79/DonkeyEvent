<?php
require_once("config/db.php");
class Model
{
    protected $pdo;
    public function __construct() {
        $this->setPDO();
    }
    private function setPDO()
    {
        $this->pdo = require_once("config/db.php");
    }
}
