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
</head>
<body>
    <h1>Student List</h1>
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
    <a href="student/add.php">Add a new student</a>
</body>
</html>