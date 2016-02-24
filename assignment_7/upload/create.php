<?php require_once('../includes/header.php'); ?>

<?php
  if (isset($_POST['submit'])) {
    $title         = mysqli_real_escape_string($mysql_connection, $_POST['title']);
    $file_name     = mysqli_real_escape_string($mysql_connection, $_FILES['image_file']['name']);
    $file_size     = mysqli_real_escape_string($mysql_connection, $_FILES['image_file']['siae']);
    $file_type     = mysqli_real_escape_string($mysql_connection, $_FILES['image_file']['type']);
    $file_tmp_name = $_FILES['image_file']['tmp_name'];
    
    if ($user = getCurrentUser()) {
      $user_id = $user['id'];
    } else {
      $user_id = 0;
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
    $new_file_path = "../files/photots/$id";
    $new_file_name = "$new_file_path/$file_name";

    mkdir($new_file_path);
    chmod($new_file_path, 0755);
    move_upload_file($file_tmp_name, $new_file_name);
    chmod($new_file_name, 0644);
  } else {
    header('Location: new.php');
  }
?>

<?php require_once('../includes/footer.php'); ?>