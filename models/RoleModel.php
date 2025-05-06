<?php

require_once('model.php');
interface RoleCrudInterface
{
    public function read();
    public function create($role_name);
    public function update($role_id, $role_name);
    public function delete($role_id);
}
class RoleModel extends Model implements RoleCrudInterface
{
    public function __construct()
    {
        parent::__construct();
    }

    public function read()
    {
        $query = "SELECT * FROM roles";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($role_name)
    {
        $sql = "INSERT INTO roles (name) VALUES (:role_name)";
        $stmt = $this->pdo->prepare($sql);
        $result = $stmt->execute(['role_name' => $role_name]);
        if (!$result) {
            throw new Exception("Error adding new role");
        }
        return $this->pdo->lastInsertId();
    }

    public function update($role_id, $role_name)
    {
        $sql = "UPDATE roles SET role_name = :role_name WHERE id = :role_id";
        $stmt = $this->pdo->prepare($sql);
        $result = $stmt->execute(['role_name' => $role_name, 'role_id' => $role_id]);
        if (!$result) {
            throw new Exception("Error updating role");
        }
    }

    public function delete($role_id)
    {
        $sql = "DELETE FROM roles WHERE id = :role_id";
        $stmt = $this->pdo->prepare($sql);
        $result = $stmt->execute(['role_id' => $role_id]);
        if (!$result) {
            throw new Exception("Error deleting role");
        }
    }
}
