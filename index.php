<?php
require "./vendor/autoload.php";

use App\Repositories\Student as StudentRepository;
use App\Controllers\StudentController;
use App\Models\Student;

$controller = new StudentController(new StudentRepository());
$student = $controller->show(1);
$status = $controller->delete(4);

$jose = $controller->show(5);
$jose->setName('Josef');
$statusUpdated = $controller->update($jose);


$students = $controller->index();





?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Participate</title>
</head>
<body>
    <h1>Student List</h1>
    <p>Delete status: <?= $status? 'Successful' : 'Failed' ?></p>
    <p>The student with id: <?= $student? $student->getFullName() : 'Not found' ?></p>
    <table>
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
    <a href="./student/add.php">Add a new student</a>
</body>
</html>