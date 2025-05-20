<?php
require "../db.php";


if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $result = get_user_by_username($username)->fetch_assoc();
    
    if ($result != null) {
        if (($result["username"] === $username) && ($result["password"] === $password)) {
            session_start();
            $_SESSION["user_id"] = $result["id"];
            header("Location: ../index.php?message=login+berhasil");
        } else {
            header("Location: ./login.php?message=ada+kesalahan+pada+username+atau+password");
        }
    } else {
        header("Location: ./register.php?message=user+tidak+ditemukan+harap+register+terlebih+dahulu!");
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <script src="../assets/bootstrap/js/bootstrap.min.js" crossorigin="anonymous"></script>
</head>
<body>
    <form action="" method="post" class="card bg-primary w-50 m-auto p-2 mt-5">
        
        <div>
            <label for="username" class="form-label">Username: </label>
            <input type="text" id="username" name="username" class="form-control">
        </div>
        <div>
            <label class="form-label" for="password">Password: </label>
            <input class="form-control" type="password" id="password" name="password">
        </div>
        <button class="btn btn-success mt-2" type="submit" name="submit">Login</button>
        <a href="../index.php" class="btn btn-warning mt-2 text-white">Home</a>
    </form>
</body>
</html>