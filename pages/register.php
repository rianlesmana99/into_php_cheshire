<?php
require "../db.php";



if (isset($_POST["submit"])) {
    $username = htmlspecialchars($_POST["username"]);
    $password = htmlspecialchars($_POST["password"]);
    $result = add_data_user($username, $password);

    if ($result) {
        session_start();
        $user = get_user_by_username($username)->fetch_assoc();
        $_SESSION["user_id"] = $user["id"];
        header("Location: ./profile_form_page.php");

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
        <button class="btn btn-success mt-2" type="submit" name="submit">Sign Up</button>
        <a href="../index.php" class="btn btn-warning mt-2 text-white">Home</a>
    </form>
</body>
</html>