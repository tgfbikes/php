<?php

  include('../includes/header.php');

  if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $sql = "DELETE FROM kids WHERE id = '$id'";
    mysqli_query($mysql_connection, $sql);
    header('Location: index.php');
  } else {
    header('Location: index.php');
  }

  include('../includes/footer.php');

?>