<?php

namespace Database\Seeders;

use App\Models\Student as Model;
use App\Repositories\Student as Repository;
use Faker\Factory;
use Faker\Generator;

class Student {

    private Repository $repository;
    private Generator $faker;

    public function __construct(Repository $repository)
    {
        $this->repository = $repository;
        $this->faker = Factory::create();
    }

    public function generateStudents(int $number){
        for($i = 0; $i<$number; $i++){
            $this->repository->save(
                new Model(
                    $this->faker->firstName,
                    $this->faker->lastName,
                    $this->faker->email
                )
            );
        }
    }

}