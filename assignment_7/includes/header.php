<?php
  session_start();
  require_once('mysql.php');
  require('functions.php');
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Uploads</title>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">
</head>
<body>
  <nav class="blue">
    <div class="nav-wrapper">
      <div class="row">
        <div class="col s12">
          <a href="#" class="brand-logo center">Upload a photo</a>
            <ul id="nav-mobile" class="left hide-on-med-and-down">
              <li><a href="../upload/index.php">Home</a></li>
              <li><a href="../upload/new.php">Upload a new photo</a></li>
            </ul>
        </div>
      </div>
    </div>
  </nav>
  <div class="container">
