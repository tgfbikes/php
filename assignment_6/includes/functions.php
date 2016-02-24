<?php

  function getCurrentUser() {
    global $mysql_connection;
    
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

  function strIfSet(&$str) {
    if (isset($str)) {
      return $str;
    } else {
      return '';
    }
  }

  function errorMessageForField(&$errors, $field) {
    if (isset($errors)) {
      if(isset($errors[$field])) {
        return "<span class='red-text'>* $errors[$field]</span>";
      }
    } else {
      return '';
    }
  }

  function checkPassword($str) {
    $pattern = '^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$';
    if (preg_match($pattern, $str)) {
      return true;
    } else {
      return false;
    }
  }
                           
?>