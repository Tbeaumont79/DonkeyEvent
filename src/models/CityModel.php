<?php

namespace Thibaultbeaumont\DonkeyEvent\Models;
use PDO;
interface CityCrud
{
    public function create();
    public function read();
    public function update();
    public function delete();
}


class CityModel extends Model implements CityCrud
{
    public function create() {}

    public function __construct()
    {
        parent::__construct();
    }

    public function read()
    {
        $query = "SELECT * FROM city WHERE id IN (SELECT MIN(id) FROM city GROUP BY name);";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        $cities = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $cities;
    }

    public function update() {}
    public function delete() {}
}

?>


