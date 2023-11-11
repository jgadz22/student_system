<?php

$host = "localhost";
$username = "root";
$password = "";
$database = "student_system";

$connection = new mysqli($host, $username, $password, $database);

if ($connection->connect_error) {
    echo $connection->connect_error;
}

$sql = "SELECT * FROM student_list";
$students = $connection->query($sql) or die($connection->error);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student System</title>
</head>

<body>
    <h1>Student System</h1>

    <br />

    <table>
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = $students->fetch_assoc()) {
            ?>
                <tr>
                    <td><?php echo $row['first_name']; ?></td>
                    <td><?php echo $row['last_name']; ?></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</body>

</html>