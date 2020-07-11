<?php
require "../../vendor/autoload.php";

use App\Repositories\Student as StudentRepository;
use App\Controllers\StudentController;
use App\Models\Student;

var_dump($_POST);
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
</head>
<body>
    <h1>Add new student</h1>
    <form method="post">
        <label for="name">First name:</label>
        <input type="text" id="name" name="name">
        <label for="last_name">Last name:</label>
        <input type="text" id="last_name" name="last_name">
        <label for="email">Email:</label>
        <input type="text" id="email" name="email">
        <input type="submit" name="submit" value="Create">
    </form>

</body>
</html>