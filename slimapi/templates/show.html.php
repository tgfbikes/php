<?php require_once('./includes/header.php'); ?>

<?php if ($beard): ?>

<div class="row">
  <div class="card col s6 push-s3">
    <div class="card-content">
      <span class="card-title"><?= $beard['name'] ?>'s Beard Info</span>
      <div class="card-content">
        <p>
          <strong>Beard Type:</strong>
          <?= $beard['beard_type'] ?>
        </p>
        <p>
          <strong>Level of Awesomeness:</strong>
          <?= $beard['awesomeness'] ?>
        </p>
        <p>
          <strong>Age (months):</strong>
          <?= $beard['age'] ?>
        </p>
        <div class="card-action">
          <a class="waves-effect btn green accent-1" href="/slimapi/index.php/beard/edit/<?= $beard['id'] ?>">Edit <?= $beard['name'] ?>'s info</a>
        </div>
        <div class="card-action">
          <form method="POST" action="/slimapi/index.php/beards/destroy">
            <input type="hidden" name="id" value="<?= $beard['id'] ?>">
            <input class="waves-effect btn red accent-1" type="submit" name="submit" value="Delete <?= $beard['name'] ?>'s Beard">
          </form>
        </div>
        <div class="card-action">
          <a class="waves-effect btn blue accent-1" href="/slimapi/index.php/beards">Back to all beards</a>
        </div>
      </div>
    </div>
  </div>
</div>

<?php else: ?>
  <p>Nothing to show</p>
<?php endif ?>

<?php require_once('./includes/footer.php');