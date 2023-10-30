<?php

require __DIR__ . '/../../config.php';

class Employee
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function insert($firstName, $lastName, $birthDate, $role, $salary)
    {
        try {
            $query = "INSERT INTO employees (firstName, lastName, birthDate, role, salary) VALUES (:firstName, :lastName, :birthDate, :role, :salary)";
            $stmt = $this->db->prepare($query);

            $stmt->bindParam(':firstName', $firstName);
            $stmt->bindParam(':lastName', $lastName);
            $stmt->bindParam(':birthDate', $birthDate);
            $stmt->bindParam(':role', $role);
            $stmt->bindParam(':salary', $salary);

            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            return false;
        }
    }
    public function getEmployees()
    {
        try {
            $query = "SELECT * FROM employees";
            $stmt = $this->db->query($query);

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return array();
        }
    }

    public function update($id, $firstName, $lastName, $birthDate, $role, $salary)
    {
        try {
            $query = "UPDATE employees SET firstName = :firstName, lastName = :lastName, birthDate = :birthDate, role = :role, salary = :salary WHERE id = :id";
            $stmt = $this->db->prepare($query);

            $stmt->bindParam(':firstName', $firstName);
            $stmt->bindParam(':lastName', $lastName);
            $stmt->bindParam(':birthDate', $birthDate);
            $stmt->bindParam(':role', $role);
            $stmt->bindParam(':salary', $salary);
            $stmt->bindParam(':id', $id);

            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            return false;
        }
    }
    public function delete($id)
    {
        try {
            $query = "DELETE FROM employees WHERE id = :id";
            $stmt = $this->db->prepare($query);

            $stmt->bindParam(':id', $id);

            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            return false;
        }
    }
}
