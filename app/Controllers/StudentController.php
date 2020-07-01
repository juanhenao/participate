<?php


namespace App\Controllers;


use App\Repositories\Student as Repository;
use App\Models\Student;

class StudentController
{
    private Repository $repository;

    /**
     * StudentController constructor.
     * @param Repository $repository
     */
    public function __construct(Repository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        return $this->repository->getAll();
    }

    public function show(int $id)
    {
        try{
            return $this->repository->getById($id);
        }catch (\Exception $e){
            return null;
        }
    }

    public function store(Student $student)
    {
        return $this->repository->save($student);
    }

    public function update(Student $student)
    {
        return $this->repository->modify($student);
    }

    public function delete(int $id)
    {
        return $this->repository->delete($id);
    }
}