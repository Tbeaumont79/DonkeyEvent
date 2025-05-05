
<?php
require_once __DIR__ . '/model.php';
interface Crud
{
    public function create();
    public function read();
    public function update();
    public function delete();
}


class City extends Model implements Crud
{
    public function create() {}

    public function __construct()
    {
        parent::__construct();
    }

    public function read()
    {
        $sql = 'select * from city';
        $query = $this->pdo->prepare($sql);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        var_dump($result);

        return $result;
    }

    public function update() {}
    public function delete() {}
}
$cityObjet = new City();
$cityObjet->read();

?>


