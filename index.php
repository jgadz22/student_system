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
$row = $students->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student System</title>

    <style>
        body {
            font-family: "Arial";
        }

        h1 {
            text-align: center;
        }

        table {
            width: 100%;
            text-align: center;
            padding: 10px;
            box-sizing: border-box;
            background-color: #ffffff;
            font-size: 16px;
            border-collapse: collapse;
            position: relative;
            left: 0;
        }

        th,
        td {
            text-align: center;
            padding: 15px;
            box-sizing: border-box;
        }

        thead {
            color: #ffffff;
            font-weight: normal;
            background-color: #8f8f8f;
            border-bottom: solid 2px #d8d8d8;
            position: sticky;
            top: 0;
        }

        td {
            border: solid 1px #d8d8d8;
            border-left: 0;
            border-right: 0;
            white-space: nowrap;
        }

        h2 {
            margin: 0;
            padding: 0;
        }

        tbody>tr {
            transition: background-color 150ms ease-out;

            &:nth-child(2n) {
                background-color: #f2f2f2;
            }

            &:hover {
                background-color: #d0d0d0;
            }
        }
    </style>
</head>

<body>
    <h1>Student System</h1>

    <br />

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