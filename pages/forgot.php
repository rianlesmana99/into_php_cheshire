<?php
    require "../db.php";
    
    $available = false;
    $username;
    if (isset($_GET["check"])) {
        $username = htmlspecialchars($_GET["username"]);
        $result = get_user_by_username($username)->fetch_assoc();

        if ($result !== null) {
            $available = true;
        }
    }

    if ($available) {
        if (isset($_POST["submit"])) {
            $password = htmlspecialchars($_POST["password"]);
            $result = forgot_password($username, $password);
            if ($result) {
                header("Location: ./login.php?message=password+diupdate");
            }
        }
    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Password</title>
</head>
<body>
    <main>
        <?php if (!$available) :?>
            <form action="" method="get">
                <p>Username: </p>
                <input type="text" name="username" id="username" required>
                <button id="check" name="check">Check</button>
            </form>
        <?php endif ?>

        <?php if ($available) : ?>
            <form action="" method="post">
                <p>Masukan password baru: </p>
                <input type="password" name="password" id="password">
                <button type="submit" name="submit">Submit</button>
            </form>
        <?php endif ?>
    </main>
</body>
</html>