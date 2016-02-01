<?php include('../includes/header.php'); ?>

<?php
  // connect to the database
  $mysql_connection = mysqli_connect('mysql.cs.dixie.edu', 'sking', 'P@$$word', 'sking');

  $id = $_GET['id'];

  $sql = "SELECT * FROM kids WHERE id = '$id'";

  $result = mysqli_query($mysqli_connection, $sql);

  $row = mysqli_fetch_array($result);

?>

<h1>Show a child</h1>

<?= $row['first_name']; ?>

<?php include('../includes/footer.php'); ?>