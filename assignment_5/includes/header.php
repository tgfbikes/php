<?php 
  session_start(); 
  require_once('mysql.php');
  require('functions.php');
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Kids</title>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">
</head>
<body>
  <nav class="pink">
    <div class="nav-wrapper">
      <div class="row">
        <div class="col s12">
          <a href="#" class="brand-logo center">I got kids</a>
          <?php if ($row = getCurrentUser()): ?>
            <ul id="nav-mobile" class="left hide-on-med-and-down">
              <li><a href="../kids/index.php">Home</a></li>
              <li><a href="../kids/new.php">New</a></li>
            </ul>
            <ul class="right">
              <li><i class="material-icons">perm_identity</i></li>
              <li><?= $row['email']; ?>&nbsp;</li>
              <li>
                <form action="../session/destroy.php" method="POST">
                  <button class="waves-effect waves-light btn" type="submit">Log out</button>
                </form>
              </li>
            </ul>
          <?php else: ?>
            <ul class="left hide-on-med-and-down">
              <li><a href="../user/new.php">Sign Up</a></li>
              <li><a href="../session/new.php">Sign In</a></li>
            </ul>
          <?php endif ?>
        </div>
      </div>
    </div>
  </nav>
  <div class="container">
  
