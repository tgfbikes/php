<?php require_once('../includes/header.php') ?>
<?php
  if (isset($_POST['submit'])) {
    // get values from $_POST
    $email          = mysqli_real_escape_string($mysql_connection, $_POST['email']);
    $password       = $_POST['password'];
    
    $errors = [];
    
    if (empty($email)) {
      $errors['email'] = "Please enter your email";
    }
    if (empty($password)) {
      $errors['password'] = "Please enter your password";
    }
                                                
    if (empty($errors)) {
      $encrypted_password = password_hash($password, PASSWORD_DEFAULT);

      $sql = "SELECT * FROM users WHERE email = '$email'";
      $result = mysqli_query($mysql_connection, $sql);

      if ($row = mysqli_fetch_array($result)) {
        if (password_verify($password, $row['encrypted_password'])) {
          $_SESSION['user_id'] = $row['id'];
          header('Location: ../kids/index.php');
        }
      }
    }
  }
?>

<?php if (empty($errors)): ?>

  <h2>Something is jacked...</h2>
  <p>Either your email or password is incorrect. Please check both and <a href="new.php">login again</a></p>
  <p>Or if you don't have an accout you can <a href="../user/create.php">sign up</a></p>

<?php else: ?>

  <?php
    require_once('new.php');
  ?>
  
<?php endif ?>

<?php require_once('../includes/footer.php') ?>