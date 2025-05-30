<?php
require "../db.php";
require "../auth.php";

if (isset($_POST["submit"])) {
    $title = $_POST["title"];
    $content = $_POST["content"];
    $user_id = $_SESSION["user_id"];

    $result = add_article($title, $content, $user_id);

    if ($result) {
        header("Location: ./news.php");
    }
}



$conn->close();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Article</title>
</head>
<body>
    <form action="" method="post">
        <div>
            <label for="title">Titile</label>
            <input type="text" name="title" id="title">
        </div>
        <div>
            <label for="content">Content:</label>
            <textarea name="content" id="content"></textarea>
        </div>
        <input type="submit" name="submit" id="submit" value="Submit">
    </form>
</body>
</html>