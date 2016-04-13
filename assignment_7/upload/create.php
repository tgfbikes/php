<?php require_once('../includes/header.php'); ?>

<?php
  if (isset($_POST['submit'])) {
    $title         = mysqli_real_escape_string($mysql_connection, $_POST['title']);
    $file_name     = mysqli_real_escape_string($mysql_connection, $_FILES['file']['name']);
    $file_size     = mysqli_real_escape_string($mysql_connection, $_FILES['file']['size']);
    $file_type     = mysqli_real_escape_string($mysql_connection, $_FILES['file']['type']);
    $file_tmp_name = $_FILES['file']['tmp_name'];

    if ($user = getCurrentUser()) {
      $user_id = $user['id'];
    } else {
      $user_id = 0;
    }

    $errors = [];

    if (empty($title)) {
      $errors['title'] = "Cannot be blank";
    }

    if ($file_size == 0) {
      $errors['file_size'] = "Your file size is 0, either you need to select a file or your file is over 2MB; sucks for you, select another file";
    }

    if ($file_type == 'image/jpeg') {
      $errors['file_type'] = "Your file must not be of type jpeg, because that would be convenient";
    }

    $sql = "INSERT INTO photos (title, file_name, file_size, file_type, user_id, uploaded_at)
      VALUES (
        '$title',
        '$file_name',
        '$file_size',
        '$file_type',
        '$user_id',
        NOW()
      )";

    if (empty($errors)) {
      mysqli_query($mysql_connection, $sql);

      // check for errors
      $mysql_error = mysqli_error($mysql_connection);
      echo $mysql_error;

      // gets id of last insert for current connection
      $id = mysqli_insert_id($mysql_connection);
      $new_file_path = "../files/photos/$id";
      $new_file_name = "$new_file_path/$file_name";

      // make id directory
      mkdir($new_file_path);
      // change permissions on that directory
      chmod($new_file_path, 0755);
      // move uploaded file into directory
      move_uploaded_file($file_tmp_name, $new_file_name);
      // change permissions of the file
      chmod($new_file_name, 0644);
    }

  } else {
    header('Location: new.php');
  }
?>

<?php if (empty($errors)): ?>

  <div class="row">
    <div class="card col s6 push-s3">
      <div class="card-content">
        <span class="card-title"><?= $title ?> uploaded</span>
        <div class="card-content">
          <p>
            <strong>File Name:</strong>
            <?= $file_name ?>
          </p>
          <p>
            <strong>File Size:</strong>
            <?= $file_size?>
          </p>
          <div class="card-action">
            <a class="waves-effect btn black accent-1" href="index.php">Back to all photos</a>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php else: ?>

  <?php
      require_once('new.php');
  ?>

<?php endif ?>

<?php require_once('../includes/footer.php'); ?>
