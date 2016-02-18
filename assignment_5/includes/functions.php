<?php

  function getCurrentUser() {
    global $mysqlconnection;
    
    if (isset($_SESSION['user_id'])) {
      $id = $_SESSION['user_id'];
      $sql = "SELECT * FROM users WHERE id = '$id'";
      $result = mysqli_query($mysql_connection, $sql);
      if ($row = mysqli_fetch_array($result)) {
        return $row;
      } else {
        unset($_SESSION['user_id']);
        return null;
      }
    } else {
      return null;
    }
  }
                           
?>