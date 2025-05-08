<?php
$username = "root";
$password = "";
$database = "private_blog";
$host = "localhost";
$port = 3306;

$conn = mysqli_connect($host, $username, $password, $database, $port);

if (!$conn) {
    die("Error: " . mysqli_connect_error());
}

function view_data_user() {
    global $conn;
    $sql = "SELECT * FROM users";
    $result = mysqli_query($conn, $sql);
    return $result;
}


