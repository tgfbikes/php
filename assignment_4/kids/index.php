<?php require_once('../includes/header.php'); ?>

<?php
  $sql = "SELECT * FROM kids";
  if (isset($_GET['order'])) {
    $order = $_GET['order'];
    if ($order == 'age_asc') {
      $sql = "SELECT * FROM kids ORDER BY age DESC";
    }
  }

  if (isset($_GET['filter'])) {
    $filter = $_GET['filter'];
    if ($filter == 'female') {
      $sql .= " WHERE sex = 'F'";
    }
  }

  $result = mysqli_query($mysql_connection, $sql);
?>

<h1>Lots of kids</h1>

<p>
  <a class="waves-effect waves-light cyan accent-2 btn" href="index.php?order=age_asc">Order by age</a>
  <a class="waves-effect waves-light cyan accent-2 btn" href="index.php?filter=female">Show only girls</a>
</p>
<table class="striped">
  <thead>
    <tr>
      <th>First Name</th>
      <th>Middle Name</th>
      <th>Sex</th>
      <th>Birth Date</th>
      <th>Age</th>
      <th>Favorite Color</th>
    </tr>
  </thead>
  <tbody>
    <?php while($row = mysqli_fetch_array($result)): ?>
    <tr>
      <td><a href="show.php?id=<?= $row['id'] ?>"><?= $row['first_name'] ?></a></td>
      <td><?= $row['middle_name'] ?></td>
      <td><?= $row['sex'] ?></td>
      <td><?= $row['birth'] ?></td>
      <td><?= $row['age'] ?></td>
      <td><?= $row['favorite_color'] ?></td>
    </tr>
    <?php endwhile ?>
  </tbody>
</table>

<?php require_once('../includes/footer.php'); ?>