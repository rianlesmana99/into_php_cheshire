<?php
require "../db.php";

$result = get_article();

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <title>Update news</title>
</head>
<body>
    <?php while ($data = $result->fetch_object()) : ?>
        <div class="group-article">
            <h2><?= $data->title ?></h2>
            <p>Penuli: <?= $data->full_name ?></p>
            <p><?= $data->content ?></p>
        </div>
    <?php endwhile ?>
</body>
</html>