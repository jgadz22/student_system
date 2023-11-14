<?php

include_once("connections/connection.php");

$connection = connection();

$sql = "SELECT * FROM student_list ORDER BY id DESC";
$students = $connection->query($sql) or die($connection->error);
$row = $students->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student System</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <h1>Student Management System</h1>

    <br />
    <a href="add.php">Add New Student</a>
    <table>
        <thead>
            <tr>
                <th>
                    <h2>First Name</h2>
                </th>
                <th>
                    <h2>Last Name</h2>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php
            do {
            ?>
                <tr>
                    <td><?php echo $row['first_name']; ?></td>
                    <td><?php echo $row['last_name']; ?></td>
                </tr>
            <?php
            } while ($row = $students->fetch_assoc())
            ?>
        </tbody>
    </table>
</body>

</html>