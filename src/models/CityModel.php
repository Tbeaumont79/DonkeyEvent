<?php
namespace Thibaultbeaumont\DonkeyEvent\Models;
interface CityCrud
{
    public function create();
    public function read(): array;
    public function update();
    public function delete();
}


class CityModel implements CityCrud
{
    private \PDO $pdo;
    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }
    public function create() {}
    public function read(): array
    {
        $query = "SELECT * FROM city WHERE id IN (SELECT MIN(id) FROM city GROUP BY name);";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function update() {}
    public function delete() {}
}
