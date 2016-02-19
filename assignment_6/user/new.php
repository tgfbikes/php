<?php include '../includes/header.php' ?>

  <div class="row">
    <div class="col s6 push-s3">
      <h1>User Sign Up</h1>
    </div>
  </div>
  <div class="row">
    <div class="card col s6 push-s3">
      <div class="card-content">
        <span class="card-title">Fill it out stat</span>
        <form method="post" action="create.php">
          <div class="input-field">
            First name:
            <input type="text" name="first_name" value="<?= strIfSet($first_name) ?>">
          </div>
          <div class="input-field">
            Last name:
            <input type="text" name="last_name" value="<?= strIfSet($last_name) ?>">
          </div>
          <div class="input-field">
            Email:
            <input type="email" name="email" value="<?= strIfSet($email) ?>">
          </div>
          <div class="input-field">
            Password:
            <input type="password" name="password">
          </div>
          <div class="input-field">
            Confirm Password:
            <input type="password" name="confirm_password">
          </div>
          <div class="card-action">
            <button class="waves-effect btn teal accent-2" type="submit" name="submit">
              <span class="pink-text">Sign up</span>
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>

<?php include '../includes/footer.php' ?>