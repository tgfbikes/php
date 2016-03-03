<?php require_once('../includes/header.php'); ?>

<div class="row">
  <div class="col s6 push-s3">
    <h1>Upload a file</h1>
  </div>
</div>
<div class="row">
  <div class="card col s6 push-s3">
    <div class="card-content">
      <span class="card-title">Do it now</span>
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
    </div>
  </div>
</div>

<?php require_once('../includes/footer.php'); ?>