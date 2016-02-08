<?php require_once('../includes/header.php'); ?>

<?php

  $id = $_GET['id'];
  $sql = "SELECT * FROM kids WHERE id = '$id'";
  $result = mysqli_query($mysql_connection, $sql);
  $row = mysqli_fetch_array($result);

?>

<?php if ($row): ?>

<div class="row">
  <div class="card col s6 push-s3">
    <div class="card-content">
      <span class="card-title"><?= $row['first_name'] ?></span>
      <div class="card-content">
        <p>
          <strong>First Name:</strong>
          <?= $row['first_name'] ?>
        </p>
        <p>
          <strong>Middle Name:</strong>
          <?= $row['middle_name'] ?>
        </p>
        <p>
          <strong>Sex:</strong>
          <?= $row['sex'] ?>
        </p>
        <p>
          <strong>Birth Date:</strong>
          <?= $row['birth'] ?>
        </p>
        <p>
          <strong>Age:</strong>
          <?= $row['age'] ?>
        </p>
        <p>
          <strong>Favorite Color:</strong>
          <?= $row['favorite_color'] ?>
        </p>
        <div class="card-action">
          <a class="waves-effect btn green accent-1" href="edit.php?id=<?= $id ?>">Edit child's info</a>
        </div>
        <div class="card-action">
          <form method="POST" action="destroy.php">
            <input type="hidden" name="id" value="<?= $row['id'] ?>">
            <input class="waves-effect btn red accent-1" type="submit" name="submit" value="Delete Child">
          </form>
        </div>
        <div class="card-action">
          <a class="waves-effect btn blue accent-1" href="index.php">Back to home page</a>
        </div>
      </div>
    </div>
  </div>
</div>
<?php else: ?>
  <h3>No children to show</h3>
<?php endif ?>

<?php require_once('../includes/footer.php'); ?>