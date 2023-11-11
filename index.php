<?php

$host = "localhost";
$username = "root";
$password = "";
$database = "student_system";

$connection = new mysqli($host, $username, $password, $database);

if ($connection->connect_error) {
    echo $connection->connect_error;
} else {
    echo "Connected!";
}
