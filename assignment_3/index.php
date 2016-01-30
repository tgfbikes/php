<?php include('./includes/header.php'); ?>

<?php
  $mysql_connection = mysqli_connect('mysql.cs.dixie.edu', 'sking', 'P@$$word', 'sking');
  $sql = "SELECT * FROM kids";
  $result = mysqli_query($mysql_connection, $sql);
?>

<h1>Lots of kids</h1>
<table>
  <tr>
    <th>First Name</th>
    <th>Middle Name</th>
    <th>Sex</th>
    <th>Birth Date</th>
    <th>Age</th>
    <th>Favorite Color</th>
  </tr>
  <?php while($row = mysqli_fetch_array($result)): ?>
  <tr>
    <td><?= $row['first_name'] ?></td>
    <td><?= $row['middle_name'] ?></td>
    <td><?= $row['sex'] ?></td>
    <td><?= $row['birth'] ?></td>
    <td><?= $row['age'] ?></td>
    <td><?= $row['favorite_color'] ?></td>
  </tr>
  <?php endwhile ?>
</table>

<?php include('./includes/footer.php'); ?>