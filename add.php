<?php

include_once("connections/connection.php");

$connection = connection();

if (isset($_POST['submit'])) {
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $gender = $_POST['gender'];

    $sql = "INSERT INTO `student_list`(`first_name`, `last_name`, `gender`) VALUES ('$fname','$lname','$gender')";

    $connection->query($sql) or die($connection->error);

    echo header("Location: index.php");
}
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

    <form action="" method="post">
        <label>First Name</label>
        <input type="text" name="firstname" id="firstname">

        <label>Last Name</label>
        <input type="text" name="lastname" id="lastname">

        <label>Gender</label>
        <select name="gender" id="gender">
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Other">Other</option>
        </select>

        <input type="submit" name="submit" value="Submit Form">
    </form>

</body>

</html>