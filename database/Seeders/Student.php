<?php

namespace Database\Seeders;

use App\Models\Student as Model;
use App\Repositories\Student as Repository;

class Student extends AbstractSeeder
{

    public function __construct(Repository $repository)
    {
        $this->repository = $repository;
    }

    public function seed(int $number): void
    {
        for ($i = 0; $i < $number; $i++) {

            $student = new Model();
            $student->setName($this->faker->firstName);
            $student->setLastName($this->faker->lastName);
            $student->setEmail($this->faker->email);

            $this->repository->save($student);
        }
    }

}