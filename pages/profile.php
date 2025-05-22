<?php
require "../db.php";
require "../auth.php";


$user_id = $_SESSION["user_id"];

$result = get_profile_data($user_id)->fetch_assoc();

var_dump($result);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - User</title>
</head>
<body>
    <p>Full Name: <?= $result["full_name"] ?></p>
    <p>Email: <?= $result["email"] ?> </p>
    <a href="../index.php">Home</a>
</body>
</html>