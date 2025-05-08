<?php
require "./db.php";

$result_data = view_data_user();
$num = 1;
// var_dump($result_data);

$conn->close()
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Private Blog</title>
    <link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.min.css">
    <script src="./assets/bootstrap/js/bootstrap.min.js" crossorigin="anonymous"></script>
  </head>
  <body>
    <table class="table table-dark table-striped-columns">
        <tr>
          <th>No.</th>
          <th>Id</th>
          <th>Username</th>
          <th>Password</th>
        </tr>
    <?php while ($data = $result_data->fetch_assoc()) : ?>
        <tr>
          <td>
            <?= $num ?>
          </td>
          <td>
            <?= $data["id"] ?>
          </td>
          <td>
            <?= $data["username"] ?>
          </td>
          <td>
            <?= $data["password"] ?>
          </td>
        </tr>
        <?php $num++; ?>
      <!-- <div class="card">
        <p>Id: <?php // $data["id"] ?></p>
        <p>Name: <?php // $data["username"] ?></p>
        <p>Password: <?php // $data["password"] ?></p>
      </div> -->
    <?php endwhile ?>
    </table>
  </body>
</html>
