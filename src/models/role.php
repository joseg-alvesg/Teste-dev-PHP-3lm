<?php

require __DIR__ . '/../../config.php';

class Role
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function create($description)
    {
        $query = "INSERT INTO role (description) VALUES (:description)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':description', $description);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    public function update($id, $description)
    {
        try {
            $query = "UPDATE role SET description = :description WHERE id = :id;";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':description', $description);
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo $e;
            return false;
        }
    }

    public function delete($id)
    {
        try {
            $query = "Delete from employees where role = :id ;
      Delete from role where id = :id";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':id', $id);
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo $e;
            return false;
        }
    }

    public function getRoles()
    {
        try {
            $query = "SELECT * FROM role";
            $stmt = $this->db->query($query);

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return array();
        }

    }
}
