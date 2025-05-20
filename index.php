<?php
require "./db.php";
require "./auth.php"; // ini yang jadi midleware

$result_data = view_data_user();
$num = 1;

if (isset($_GET["delete"])) {
  $id = $_GET["id"];

  delete_data_user($id);
}
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
  <body class="d-flex justify-content-center align-items-center flex-column" style="width: 100vw; height: 100vh;">
    <?php if (isset($_GET["message"])) : ?>
        <p class="alert alert-success text-center" style="width: 800px"><?= $_GET["message"] ?></p>
    <?php endif ?>
    <div class="card p-2 shadow-sm" style="width: 800px">
      <h1 class="text-center" style="font-size: 30px;">List User</h1>
      <a class="btn btn-success w-25 mb-2" href="./pages/register.php">Sign Up</a>
      <table class="table table-info table-striped-columns">
        <tr class="text-center">
          <th style="width: 30px;">No.</th>
          <th>Id</th>
          <th>Username</th>
          <th>Password</th>
          <th>Action</th>
        </tr>
    <?php while ($data = $result_data->fetch_assoc()) : ?>
        <tr>
          <td class="text-center">
            <?= $num ?>
          </td>
          <td class="text-center">
            <?= $data["id"] ?>
          </td>
          <td>
            <?= $data["username"] ?>
          </td>
          <td>
            <?= $data["password"] ?>
          </td>
          <td class="w-25" style="text-align: center;">
            <a href="./index.php?delete=1&id=<?= $data["id"] ?>" class="btn btn-danger">Delete</a>
            <a href="./pages/update.php?id=<?= $data["id"]?>" class="btn btn-primary">Update</a>
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
    </div>
    
  </body>
</html>

<?php $conn->close(); ?>
