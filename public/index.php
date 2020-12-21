<?php
require "../vendor/autoload.php";

use App\Repositories\Student as StudentRepository;
use App\Controllers\StudentController;

$controller = new StudentController(new StudentRepository());

$students = $controller->index();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Participate</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>
    <div class="container-md">
        <h1>Student List</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Inscription</th>
                    <th>Contributions</th>
                </tr>
            </thead>
            <tbody>
            <?php
            foreach ($students as $student) {
                echo "<tr>";
                echo "<td>{$student->getId()}</td>";
                echo "<td>{$student->getFullName()}</td>";
                echo "<td>{$student->getEmail()}</td>";
                echo "<td>{$student->getCreatedAt()->format('d.m.Y')}</td>";
                echo "<td>*</td>";
                echo "</tr>";
            }
            ?>
            </tbody>
        </table>
        <a href="student/add.php" class="btn btn-primary">Add a new student</a>
    </div>
</body>
</html>