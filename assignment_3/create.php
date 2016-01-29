<?php include('./includes/header.php'); ?>

<?php 
  if (isset($_POST['submit'])) {
    // get values from $_POST
    $title           = $_POST['title'];
    $genre           = $_POST['genre'];
    $date_of_release = $_POST['date_of_release'];
    $console         = $_POST['console'];
    $developer       = $_POST['developer'];
    $rating          = $_POST['rating'];
    $revenue         = $_POST['revenue'];


    // connect to the database
    $mysql_connection = mysqli_connect('mysql.cs.dixie.edu', 'sking', 'P@$$word', 'sking');
    
  } else {
    // redirect if not POST
    header('Location: new.php');
  }
    // insert into the table
?>

<?php include('./includes/footer.php'); ?>