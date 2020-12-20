<?php


namespace App\Repositories;


use App\Models\Student as StudentModel;
use DateTime;
use Exception;
use PDO;

class Student extends AbstractRepository
{

    public function getAll(): array
    {
        $query = "SELECT * FROM students";
        $stmt = $this->getConnection()->query($query);
        return $stmt->fetchAll(PDO::FETCH_CLASS, StudentModel::class);
    }

    public function getById(int $id): StudentModel
    {
        $query = "SELECT * FROM students WHERE id = ?";

        $stmt = $this->getConnection()->prepare($query);
        $stmt->setFetchMode(PDO::FETCH_CLASS, StudentModel::class);
        $stmt->execute([$id]);

        $result = $stmt->fetch();
        if(!$result){
            throw new Exception("No student found");
        }
        return $result;
    }

    public function save(StudentModel $student): bool
    {
        $now = new DateTime();
        $query = "INSERT INTO students(name, last_name, email, created_at, updated_at) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->getConnection()->prepare($query);
        $result = $stmt->execute([
            $student->getName(),
            $student->getLastName(),
            $student->getEmail(),
            $now->format('Y-m-d H:i:s'),
            $now->format('Y-m-d H:i:s')
        ]);
        return !$stmt->rowCount()==0;
    }

    public function modify(StudentModel $student): bool
    {
        $now = new DateTime();
        $query = "UPDATE students SET name = ?, last_name = ?, email = ?, updated_at = ? WHERE id = ?";
        $stmt = $this->getConnection()->prepare($query);
        $result = $stmt->execute([
            $student->getName(),
            $student->getLastName(),
            $student->getEmail(),
            $now->format('Y-m-d H:i:s'),
            $student->getId()
        ]);
        return !$stmt->rowCount()==0;
    }

    public function delete(int $id): bool
    {
        $query = "DELETE FROM students WHERE id = ?";
        $stmt = $this->getConnection()->prepare($query);
        $stmt->setFetchMode(PDO::FETCH_CLASS, StudentModel::class);
        $result = $stmt->execute([$id]);
        return !$stmt->rowCount()==0;
    }
}