<?php
require_once("config/db.php");
class Model extends Db
{
    public function __construct()
    {
        parent::__construct();
    }
}
