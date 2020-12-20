<?php


namespace Database\Seeders;

use App\Models\Contribution as ContributionModel;
use App\Models\Student as StudentModel;
use App\Repositories\Contribution as ContributionRepository;
use App\Repositories\Student as StudentRepository;


class Contribution extends AbstractSeeder
{

    public function __construct(ContributionRepository $repository)
    {
        $this->repository = $repository;
    }

    private function getStudentsIds(): array
    {
        $studentRepository = new StudentRepository();
        $students = $studentRepository->getAll();

        return array_map(fn(StudentModel $student) => $student->getId(), $students);
    }

    public function seed(int $number): void
    {
        $studentsIds = $this->getStudentsIds();
        $annotations = ['Bad', 'Regular', 'Good', 'Excellent'];

        for ($i = 0; $i < $number; $i++) {
            $contribution = new ContributionModel();
            $contribution->setStudentId($studentsIds[array_rand($studentsIds, 1)]);
            $contribution->setAnnotation($annotations[array_rand($annotations)]);
            $contribution->setValoration(mt_rand(0, 10));

            $this->repository->save($contribution);
        }
    }

}