<?php
if (!isset($_SESSION)) {
    session_start();
}

if (isset($_SESSION['Access']) && $_SESSION['Access'] == "Admin") {
    echo "Welcome " . $_SESSION['UserLogin'];
} else {
    echo header("Location: index.php");
}

include_once("connections/connection.php");

$connection = connection();

$id = $_GET['ID'];

$sql = "SELECT * FROM student_list WHERE id = '$id'";
$students = $connection->query($sql) or die($connection->error);
$row = $students->fetch_assoc();

if (isset($_POST['submit'])) {
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $gender = $_POST['gender'];

    $sql = "UPDATE student_list SET first_name = '$fname', last_name = '$lname', gender = '$gender' WHERE id = '$id'";

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
    <h1>Edit Student Info of <?php echo $row['first_name']; ?></h1>
    <form action="" method="post">
        <label>First Name</label>
        <input type="text" name="firstname" id="firstname" value="<?php echo $row['first_name']; ?>">

        <label>Last Name</label>
        <input type="text" name="lastname" id="lastname" value="<?php echo $row['last_name']; ?>">

        <label>Gender</label>
        <select name="gender" id="gender">
            <option value="Male" <?php echo ($row['gender'] == 'Male') ? 'selected' : ''; ?>>Male</option>
            <option value="Female" <?php echo ($row['gender'] == 'Female') ? 'selected' : ''; ?>>Female</option>
            <option value="Other" <?php echo ($row['gender'] == 'Other') ? 'selected' : ''; ?>>Other</option>
        </select>

        <input type="submit" name="submit" value="Update">
    </form>

    <a href="index.php">Back</a>
</body>

</html>