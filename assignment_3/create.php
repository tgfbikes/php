<?php include('./includes/header.php'); ?>

<?php 
  if (isset($_POST['submit'])) {
    // get values from $_POST
    $first_name     = $_POST['first_name'];
    $middle_name    = $_POST['middle_name'];
    $sex            = $_POST['sex'];
    $birth          = $_POST['birth'];
    $age            = $_POST['age'];
    $favorite_color = $_POST['favorite_color'];


    // connect to the database
    $mysql_connection = mysqli_connect('mysql.cs.dixie.edu', 'sking', 'P@$$word', 'sking');
    
    $sql = "INSERT INTO kids (first_name, middle_name, sex, birth, age, favorite_color) VALUES (
    '$first_name', 
    '$middle_name', 
    '$sex', 
    '$birth', 
    '$age', 
    '$favorite_color'
    )";
    
    mysqli_query($mysql_connection, $sql);
    
  } else {
    // redirect if not POST
    header('Location: new.php');
  }
    // insert into the table
?>

<div class="row">
  <div class="card col s6 push-s3">
    <div class="card-content">
      <span class="card-title">You added <?= $first_name ?></span>
      <div class="card-content">
        <p>
          <strong>First Name:</strong>
          <?= $first_name ?>
        </p>
        <p>
          <strong>Middle Name:</strong>
          <?= $middle_name ?>
        </p>
        <p>
          <strong>Sex:</strong>
          <?= $sex ?>
        </p>
        <p>
          <strong>Birth Date:</strong>
          <?= $birth ?>
        </p>
        <p>
          <strong>Age:</strong>
          <?= $age ?>
        </p>
        <p>
          <strong>Favorite Color:</strong>
          <?= $favorite_color ?>
        </p>
        <div class="card-action">
          <a class="waves-effect btn blue accent-1" href="index.php">Back to home page</a>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include('./includes/footer.php'); ?>