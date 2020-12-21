<?php

require "vendor/autoload.php";

Use App\Repositories\Student as StudentRepository;
Use App\Repositories\Contribution as ContributionRepository;
Use Database\Seeders\Student as StudentSeeder;
Use Database\Seeders\Contribution as ContributionSeeder;

echo "Seeding students...";
$studentSeeder = new StudentSeeder(new StudentRepository());
$studentSeeder->seed();

echo "Seeding contributions...";
$contributionSeeder = new ContributionSeeder(new ContributionRepository());
$contributionSeeder->seed();