<?php include '../includes/header.php' ?>

  <div class="row">
    <div class="col s6 push-s3">
      <h1>User Sign In</h1>
    </div>
  </div>
  <div class="row">
    <div class="card col s6 push-s3">
      <div class="card-content">
        <span class="card-title">Sign in right now</span>
        <form method="POST" action="../session/create.php">
          <div class="input-field">
            Email:
            <input type="email" name="email">
            <div><?= errorMessageForField($errors, 'email'); ?></div>
          </div>
          <div class="input-field">
            Password:
            <input type="password" name="password">
            <div><?= errorMessageForField($errors, 'password'); ?></div>
          </div>
          <div class="card-action">
            <button class="waves-effect btn teal accent-2" type="submit" name="submit">
              <span class="pink-text">Sign in</span>
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>

<?php include '../includes/footer.php' ?>