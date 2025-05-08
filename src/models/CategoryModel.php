<?php

namespace Thibaultbeaumont\DonkeyEvent\Models;

interface CategoryCrud
{
    public function create();
    public function read(): array;
    public function update();
    public function delete();
}

class CategoryModel implements CategoryCrud
{
    private \PDO $pdo;
    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function create() {}
    public function read(): array
    {
        $query = "SELECT name FROM category";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function update() {}
    public function delete() {}
}
