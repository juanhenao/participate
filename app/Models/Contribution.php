<?php


namespace App\Models;


class Contribution implements Model
{
    private int $id;
    private int $student_id;
    private string $annotation;
    private float $valoration;
    private string $created_at;
    private string $updated_at;


    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getStudentId(): int
    {
        return $this->student_id;
    }

    public function setStudentId(int $student_id): void
    {
        $this->student_id = $student_id;
    }

    public function getAnnotation(): string
    {
        return $this->annotation;
    }

    public function setAnnotation(string $annotation): void
    {
        $this->annotation = $annotation;
    }

    public function getValoration(): float
    {
        return $this->valoration;
    }

    public function setValoration(float $valoration): void
    {
        $this->valoration = $valoration;
    }

    public function getCreatedAt(): string
    {
        return $this->created_at;
    }

    public function setCreatedAt(string $created_at): void
    {
        $this->created_at = $created_at;
    }

    public function getUpdatedAt(): string
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(string $updated_at): void
    {
        $this->updated_at = $updated_at;
    }

}