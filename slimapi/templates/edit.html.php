<?php require_once('./includes/header.php'); ?>

<div class="row">
  <div class="col s6 push-s3">
    <h1>Edit <?= $beard['name'] ?>'s Beard</h1>
  </div>
</div>
<div class="row">
  <div class="card col s6 push-s3">
    <div class="card-content">
      <span class="card-title">Don't screw this up</span>
      <form action="/slimapi/index.php/beards/<?= $beard['id'] ?>" method="POST" enctype="multipart/form-data">
        <div class="input-field">
          Name:
          <input type="text" name="name" value="<?= $beard['name'] ?>">
        </div>
        <div class="input-field">
          Type:
          <input type="text" name="beard_type" value="<?= $beard['beard_type'] ?>">
        </div>
        <div class="input-field">
          Awesomeness:
          <input type="number" name="awesomeness" value="<?= $beard['awesomeness'] ?>">
        </div>
        <div class="input-field">
          Age (months):
          <input type="number" name="age" value="<?= $beard['age'] ?>">
        </div>
        <input type="hidden" name="_METHOD" value="PUT"/>
        <div class="card-action">
          <button class="waves-effect btn teal accent-2" type="submit" name="submit">
            <span class="pink-text">Update Beard</span>
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

<?php require_once('./includes/footer.php'); ?>