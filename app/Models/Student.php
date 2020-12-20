<?php


namespace App\Models;

use DateTime;

class Student implements Model
{

    private int $id;
    private string $name;
    private string $last_name;
    private string $email;
    private string $created_at;
    private string $updated_at;


    public function __construct(string $name, string $last_name, string $email, string $created_at=null, string $updated_at=null)
    {
        $this->setName($name);
        $this->setLastName($last_name);
        $this->setEmail($email);
        $this->setCreatedAt($created_at);
        $this->setUpdatedAt($updated_at);
    }

    public function getFullName(): string
    {
        return $this->name . ' ' . $this->last_name;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return String
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param String $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return String
     */
    public function getLastName(): string
    {
        return $this->last_name;
    }

    /**
     * @param String $last_name
     */
    public function setLastName(string $last_name): void
    {
        $this->last_name = $last_name;
    }

    /**
     * @return String
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param String $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return DateTime
     */
    public function getCreatedAt(): DateTime
    {
        return new DateTime($this->created_at);
    }

    /**
     * @param string $created_at
     */
    public function setCreatedAt(?string $created_at): void
    {
        $this->created_at = $created_at ?? '2020-06-30 09:40:46';
    }

    /**
     * @return string
     */
    public function getUpdatedAt(): string
    {
        return $this->updated_at;
    }

    /**
     * @param \DateTime $updated_at
     */
    public function setUpdatedAt(?\DateTime $updated_at): void
    {
        $this->updated_at = $updated_at ?? '2020-06-30 09:40:46';
    }



}