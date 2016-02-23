<?php require_once('../includes/header.php'); ?>

<?php
  if (isset($_POST['submit'])) {
    // get values from $_POST
    $first_name       = mysqli_real_escape_string($mysql_connection, $_POST['first_name']);
    $last_name        = mysqli_real_escape_string($mysql_connection, $_POST['last_name']);
    $email            = mysqli_real_escape_string($mysql_connection, $_POST['email']);
    $password         = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    $errors = [];

    if (empty($email)) {
      $errors['email'] = "Please enter your email";
    }
    if (empty($password)) {
      $errors['password'] = "Please enter a password";
    }
    if (empty($confirm_password)) {
      $errors['confirm_password'] = "Please confirm your password";
    }
    if ($password != $confirm_password) {
      $errors['confirm_password'] = "Password and confirmation do not match";
      $password = '';
      $confirm_password = '';
    }

    if (empty($errors)) {
      print_r($errors);
      $encrypted_password = password_hash($password, PASSWORD_DEFAULT);

      //insert into the table
      $sql = "INSERT INTO users (first_name, last_name, email, encrypted_password) VALUES (
      '$first_name',
      '$last_name',
      '$email',
      '$encrypted_password'
      )";

      mysqli_query($mysql_connection, $sql);
      $mysql_error = mysqli_error($mysql_connection);

      $userSql = "SELECT * FROM users WHERE email = '$email'";
      $result = mysqli_query($mysql_connection, $userSql);
      $row = mysqli_fetch_array($result);
      if ($row) {
          $_SESSION['user_id'] = $row['id'];
      } else {
        header('Location: ../user/new.php');
      }
    }

  }
?>

<?php if (empty($errors)): ?>

  <div class="row">
    <div class="card col s6 push-s3">
      <div class="card-content">
        <span class="card-title"><?= $first_name ?> signed up</span>
        <div class="card-content">
          <p>
            <strong>First Name:</strong>
            <?= $first_name ?>
          </p>
          <p>
            <strong>Last Name:</strong>
            <?= $last_name ?>
          </p>
          <p>
            <strong>Email:</strong>
            <?= $email ?>
          </p>
          <div class="card-action">
            <a class="waves-effect btn blue accent-1" href="../kids/index.php">Back to home page</a>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php else: ?>

  <!-- I couldn't get the line of code, require_once('new.php') to work so I included all of the code from new.php -->
  <?php
    require_once('new.php');
  ?>

<?php endif ?>

<?php require_once('../includes/footer.php'); ?>
