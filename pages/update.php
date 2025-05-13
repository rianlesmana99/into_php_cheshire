<?php
require "../db.php";

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $data= get_user_data($id);
    $final_data = $data->fetch_assoc();
}

if (isset($_POST["submit"])) {
    $id = $_GET["id"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    edit_data_user($id, $username, $password);
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update - User</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <script src="../assets/bootstrap/js/bootstrap.min.js" crossorigin="anonymous"></script>
</head>
<body>
    <main>
        <form action="" method="post" class="card bg-primary w-50 m-auto p-2 mt-5">
        
        <div>
            <label for="username" class="form-label">Username: </label>
            <input type="text" id="username" name="username" class="form-control" value="<?= $final_data["username"] ?>">
        </div>
        <div>
            <label class="form-label" for="password">Password: </label>
            <input class="form-control" type="text" id="password" name="password" value="<?= $final_data["password"] ?>">
        </div>
        <button class="btn btn-success mt-2" type="submit" name="submit">Update</button>
        <a href="../index.php" class="btn btn-warning mt-2 text-white">Home</a>
    </form>
    </main>
</body>
</html>