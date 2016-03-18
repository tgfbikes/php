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
            <?php foreach ($beards as $beard): ?>
              <tr>
                <td><a href="/slimapi/index.php/beards/<?= $beard['id'] ?>"><?= $beard['name'] ?></a></td>
                <td><?= $beard['beard_type'] ?></td>
                <td><?= $beard['awesomeness'] ?></td>
                <td><?= $beard['age'] ?></td>
                <td>
                  <a class="btn-floating btn-medium green" href="/slimapi/index.php/beards/edit/<?= $beard['id'] ?>">
                    <i class="medium material-icons">mode_edit</i>
                  </a>
                </td>
                <td>
                  <form action="/slimapi/index.php/beards/<?= $beard['id'] ?>" method="DELETE">
                    <button class="btn-floating btn-medium red" type="submit" name="submit">
                      <i class="medium material-icons">delete</i>
                    </button>
                  </form>
                </td>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      <?php else: ?>
        <h3>Uh oh...there are no beards to show!</h3>
        <p>Quick! <a href="/slimapi/index.php/new.html.php">Go add a beard</a> and stop this crime against humanity...</p>
      <?php endif ?>
    </div>
  </div>
</div>
            
<?php require_once('./includes/footer.php'); ?>