<?php

  function getCurrentUser() {
    global $mysqlconnection;
    
    $email = $_POST['email'];
    
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($mysql_connection, $sql);
    $row = mysqli_fetch_array($result);
    if ($row) {
        $_SESSION['user_id'] = $row['id'];
    } else {
      header('Location: ../user/login.php');
    }
  }
                           
?>