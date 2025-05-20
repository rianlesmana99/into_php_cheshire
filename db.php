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

function add_data_user($username, $password) {
    global $conn;
    $encrypt = password_hash($password, PASSWORD_BCRYPT);
    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$encrypt')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: ../index.php?message=Berhasil+menambahkan+data");
    }
}

function delete_data_user($id) {
    global $conn;
    $sql = "DELETE FROM users WHERE id=$id";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: ./index.php?message=Berhasil+menghapus+data");
    }
}

function get_user_data($id) {
    global $conn;
    $sql = "SELECT * FROM users WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    return $result;
}

function edit_data_user($id, $username, $password) {
    global $conn;
    $sql = "UPDATE users SET username='$username', password='$password' WHERE id=$id";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: ../index.php?message=Berhasil+memperbarui+data");
    }
}

function get_user_by_username($username) {
    global $conn;
    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $sql);
    return $result;
}