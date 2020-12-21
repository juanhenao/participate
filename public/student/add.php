<?php
require "../../vendor/autoload.php";

use App\Repositories\Student as StudentRepository;
use App\Controllers\StudentController;
use App\Models\Student;

if(isset($_POST['submit'])){

    $controller = new StudentController(new StudentRepository());

    $newStudent = new Student();
    $newStudent->setName($_POST['name']);
    $newStudent->setLastName($_POST['last_name']);
    $newStudent->setEmail($_POST['email']);

    $statusCreated = $controller->store($newStudent);

    header('Location: ../index.php');
    die();

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

</head>
<body>
    <div class="container-md">
        <h1>Add new student</h1>
        <form method="post">
            <div class="mb-3">
                <label for="name" class="form-label">First name:</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="mb-3">
                <label for="last_name" class="form-label">Last name:</label>
                <input type="text" class="form-control" id="last_name" name="last_name">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="text" class="form-control" id="email" name="email">
            </div>
            <input type="submit" class="btn btn-primary" name="submit" value="Create">
        </form>
    </div>>
</body>
</html>