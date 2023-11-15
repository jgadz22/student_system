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

if (isset($_POST['yes'])) {
    $sql = "DELETE FROM student_list WHERE id = '$id'";

    $connection->query($sql) or die($connection->error);

    echo header("Location: index.php");
}
if (isset($_POST['cancel'])) {

    echo header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Do you really want to delete the Info of <?php echo $row['first_name'] . " " . $row['last_name'] ?>?</h1>
    <form action="" method="post">
        <button type="submit" name="yes">Yes</button>
        <button type="submit" name="cancel">Cancel</button>
    </form>
</body>

</html>