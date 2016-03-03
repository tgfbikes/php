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
    
    if ($file_size >= 2000000) {
      $errors['file_size'] = "File size cannot exceed 2MB";
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
    
    mysqli_query($mysql_connection, $sql);
    
    // check for errors

    // gets id of last insert for current connection
    $id = mysqli_insert_id($mysql_connection);
    $new_file_path = "../files/photos/$id";
    $new_file_name = "$new_file_path/$file_name";

    echo $new_file_path;
    echo $new_file_name;
    // make id directory
    mkdir($new_file_path);
    // change permissions on that directory
    chmod($new_file_path, 0755);
    // move uploaded file into directory
    move_uploaded_file($file_tmp_name, $new_file_name);
    // change permissions of the file
    chmod($new_file_name, 0644);
  } else {
    header('Location: new.php');
  }
?>

<?php require_once('../includes/footer.php'); ?>