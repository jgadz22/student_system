<?php


if (!isset($_SESSION)) {
    session_start();
}

if (isset($_SESSION['UserLogin'])) {
    echo "Welcome " . $_SESSION['UserLogin'];
    echo header("Location: index.php");
}

include_once("connections/connection.php");

$connection = connection();

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM student_admin WHERE username = '$username' AND password = '$password'";

    $user = $connection->query($sql) or die($connection->error);
    $row = $user->fetch_assoc();
    $total = $user->num_rows;

    if ($total > 0) {
        $_SESSION['UserLogin'] = $row['username'];
        $_SESSION['Access'] = $row['access'];
        echo header("Location: index.php");
    } else {
        echo "Username or Password is Incorrect!";
    }
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
    <h1>Login Page</h1>

    <br>

    <form action="" method="post">
        <label>Username:</label>
        <input type="text" name="username" id="username">

        <label>Password:</label>
        <input type="text" name="password" id="password">


        <button type="submit" name="login">Login</button>
    </form>

</body>

</html>