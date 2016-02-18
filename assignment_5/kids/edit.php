
<?php require_once('../includes/header.php'); ?>
<?php 
  if (!$_SESSION['user_id']) {
    header('Location: ../user/login.php');
  }
?>

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
        <span class="card-title">Edit <?= $row['first_name'] ?></span>
        <form method="post" action="update.php">
          <div class="input-field">
            First name:
            <input type="text" name="first_name" value="<?= $row['first_name'] ?>">
          </div>
          <div class="input-field">
            Middle name:
            <input type="text" name="middle_name" value="<?= $row['middle_name'] ?>">
          </div>
          <div class="input-field">
            Sex:
            <input type="text" name="sex" value="<?= $row['sex'] ?>">
          </div>
          <div class="input-field">
            Birth date:
            <input type="date" class="datepicker" name="birth" value="<?= $row['birth'] ?>">
          </div>
          <div class="input-field">
            Age:
            <p class="range-field">
              <input type="range" name="age" min="0" max="100" value="<?= $row['age'] ?>">
            </p>
          </div>
          <div class="input-field">
            Favorite color:
            <input type="text" name="favorite_color" value="<?= $row['favorite_color'] ?>">
          </div>
          <div class="input-field">
            <input type="hidden" name="id" value="<?= $row['id'] ?>">
          </div>
          <div class="card-action">
            <button class="waves-effect btn teal accent-2" type="submit" name="submit">
              <span class="pink-text">Submit changes</span>
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php else: ?>
  <h3>No children to show</h3>
<?php endif ?>

<?php require_once('../includes/footer.php'); ?>