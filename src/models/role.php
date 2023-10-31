<?php

require __DIR__ . '/../../config.php';

class Role
{
    private $_db;

    public function __construct($db)
    {
        $this->_db = $db;
    }

    public function create($description)
    {
        $query = "INSERT INTO role (description) VALUES (:description)";

        $stmt = $this->_db->prepare($query);

        $stmt->bindParam(':description', $description);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    public function update($id, $description)
    {
        $query = "UPDATE role SET description = :description WHERE id = :id";

        $stmt = $this->db->prepare($query);

        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':description', $description);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    public function delete($id)
    {
        $query = "DELETE FROM role WHERE id = :id";

        $stmt = $this->db->prepare($query);

        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    public function getRoles()
    {
        try {
            $query = "SELECT * FROM role";
            $stmt = $this->_db->query($query);

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return array();
        }

    }
}
