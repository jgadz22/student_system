<?php

if (!isset($_SESSION)) {
    session_start();
}

if (isset($_SESSION['UserLogin'])) {
    echo "Welcome " . $_SESSION['UserLogin'];
} else {
    echo header("Location: login.php");
}

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

    <br>
    <?php if (isset($_SESSION['UserLogin'])) { ?>
        <a href="logout.php">Logout</a>
        <?php if (isset($_SESSION['Access']) && $_SESSION['Access'] == "Admin") { ?>
            <a href="add.php">Create New Student Info</a>
        <?php } ?>
    <?php } else { ?>
        <a href="login.php">Login</a>
    <?php } ?>
    <table>
        <thead>
            <tr>
                <?php if (isset($_SESSION['Access']) && $_SESSION['Access'] == "Admin") { ?>
                    <th>Actions</th>
                <?php } ?>
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
                    <?php if (isset($_SESSION['Access']) && $_SESSION['Access'] == "Admin") { ?>
                        <td><a href="details.php?ID=<?php echo $row['id']; ?>">View</a>
                            <a href="delete.php?ID=<?php echo $row['id']; ?>">Delete</a>
                        </td>
                    <?php } ?>
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