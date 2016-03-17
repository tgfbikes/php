<?php require('./includes/header.php'); ?>

<div class="row">
  <div class="col s6 push-s3">
    <h1>Beards</h1>
  </div>
</div>
<div class="row">
  <div class="card col s6 push-s3">
    <div class="card-content">
      <span class="card-title">Beards</span>
      <?php if ($beards): ?>
        <table>
          <tbody>
              <tr>
                <td>Name</td>
                <td>Beard Type</td>
                <td>Awesomeness</td>
                <td>Age</td>
              </tr>
            <?php while ($beards): ?>
              <tr>
                <td><?= $beards['name'] ?></td>
                <td><?= $beards['beard_type'] ?></td>
                <td><?= $beards['awesomeness'] ?></td>
                <td><?= $beards['age'] ?></td>
              </tr>
            <?php endwhile ?>
          </tbody>
        </table>
      <?php else: ?>
        <h3>Uh oh...there are no beards to show!</h3>
        <p>Quick! <a href="new.html.php">Go add a beard</a> and stop this crime against humanity...</p>
      <?php endif ?>
      
      
<!--
      <form action="create.php" method="POST" enctype="multipart/form-data">
        <div class="input-field">
          Title:
          <input type="text" name="title" value="">
        </div>
        <div class="input-field">
          File:
          <input type="file" name="file">
        </div>
        <div class="card-action">
          <button class="waves-effect btn teal accent-2" type="submit" name="submit">
            <span class="pink-text">Upload Photo</span>
          </button>
        </div>
      </form>
-->
    </div>
  </div>
</div>
            
<?php require_once('./includes/footer.php'); ?>