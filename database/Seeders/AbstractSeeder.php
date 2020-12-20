<?php


namespace Database\Seeders;

use App\Repositories\AbstractRepository as Repository;
use Faker\Factory;
use Faker\Generator;

abstract class AbstractSeeder
{

    protected Generator $faker;
    protected Repository $repository;

    public function __construct()
    {
        $this->faker = Factory::create();
    }

    abstract public function seed(int $number): void;
}