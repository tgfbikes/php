<?php

  include('../includes/header.php');

    if (isset($_SESSION['user_id'])) {
      unset($_SESSION['user_id']);
      header('Location: ../user/login.php');
    } else {
      header('Location: ../kids/index.php');
    }

  include('../includes/footer.php');

?>