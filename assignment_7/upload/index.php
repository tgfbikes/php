<?php require_once('../includes/header.php'); ?>

<?php
  
  $sql = "SELECT * FROM photos";
  $result = mysqli_query($mysql_connection, $sql);

?>

  <h1>Uploaded Photos</h1>
  <table class="striped">
    <thead>
      <tr>
        <th>Title</th>
        <th>File Name</th>
        <th>File Size</th>
        <th>File Type</th>
        <th>Upload Date</th>
      </tr>
    </thead>
    <tbody>
      <?php while($row = mysqli_fetch_array($result)): ?>
      <tr>
        <td><?= $row['title'] ?></td>
        <td><?= $row['file_name'] ?></td>
        <td><?= $row['file_size'] ?></td>
        <td><?= $row['file_type'] ?></td>
        <td><?= $row['uploaded_at'] ?></td>
      </tr>
      <?php endwhile ?>
    </tbody>
  </table>

<?php require_once('../includes/footer.php'); ?>