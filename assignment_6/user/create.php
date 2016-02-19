<?php require_once('../includes/header.php'); ?>

<?php 
  if (isset($_POST['submit'])) {
    // get values from $_POST
    $first_name       = $_POST['first_name'];
    $last_name        = $_POST['last_name'];
    $email            = $_POST['email'];
    $password         = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    
    $errors = [];
    
    if (empty($email)) {
      $errors[] = "Please enter your email";
    }
    if (empty($password)) {
      $errors[] = "Please enter a password";
    }
    if (empty($confirm_password)) {
      $errors[] = "Please confirm your password";
    }
    if ($password != $confirm_password) {
      $errors[] = "Password and confirmation do not match";
      $password = '';
      $confirm_password = '';
    }
    
    $encrypted_password = password_hash($password, PASSWORD_DEFAULT);
    
    $sql = "INSERT INTO users (first_name, last_name, email, encrypted_password) VALUES (
    '$first_name', 
    '$last_name', 
    '$email', 
    '$encrypted_password'
    )";
    
    mysqli_query($mysql_connection, $sql);
    
    $userSql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($mysql_connection, $userSql);
    $row = mysqli_fetch_array($result);
    if ($row) {
        $_SESSION['user_id'] = $row['id'];
    } else {
      header('Location: ../user/login.php');
    }
    
  } else {
    // redirect if not POST
    header('Location: new.php');
  }
    // insert into the table
?>

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

<?php require_once('../includes/footer.php'); ?>