<?php
require "../db.php";
require "../auth.php";

if (isset($_POST["submit"])) {
    $full_name = htmlspecialchars($_POST["full_name"]);
    $email = htmlspecialchars($_POST["email"]);
    $user_id = htmlspecialchars($_SESSION["user_id"]);

    $result = add_profile_data($full_name, $email, $user_id);
    if ($result) {
        header("Location: /firts_project");
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Set Profile</title>
</head>
<body>
    <main>
    <h1>Lengkapi Data Diri</h1>
    <form action="" method="post">
        <div>
            <label for="full_name">Nama Lengkap: </label>
            <input type="text" name="full_name" id="full_name" placeholder="Masukan nama lengkap" required>
        </div>
        <div>
            <label for="email">Email: </label>
            <input type="email" name="email" id="email" placeholder="Masukan email" required>
        </div>
        <button type="submit" name="submit">Simpan</button>
    </form>
    </main>
</body>
</html>