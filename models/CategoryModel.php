<?php
require_once __DIR__ . '/model.php';
interface CategoryCrud
{
    public function create();
    public function read();
    public function update();
    public function delete();
}

class CategoryModel extends Model implements CategoryCrud
{

    public function __construct()
    {
        parent::__construct();
    }
    public function create() {}
    public function read()
    {
        $query = "SELECT name FROM category";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $categories;
    }

    public function update() {}
    public function delete() {}
}
