<?php include '../includes/header.php' ?>

  <div class="row">
    <div class="col s6 push-s3">
      <h1>Add New Child</h1>
    </div>
  </div>
  <div class="row">
    <div class="card col s6 push-s3">
      <div class="card-content">
        <span class="card-title">Child's information</span>
        <form method="post" action="create.php">
          <div class="input-field">
            First name:
            <input type="text" name="first_name">
          </div>
          <div class="input-field">
            Middle name:
            <input type="text" name="middle_name">
          </div>
          <div class="input-field">
            Sex:
            <input type="text" name="sex">
          </div>
          <div class="input-field">
            Birth date:
            <input type="date" class="datepicker" name="birth">
          </div>
          <div class="input-field">
            Age:
            <p class="range-field">
              <input type="range" name="age" min="0" max="100">
            </p>
          </div>
          <div class="input-field">
            Favorite color:
            <input type="text" name="favorite_color">
          </div>
          <div class="card-action">
            <button class="waves-effect btn teal accent-2" type="submit" name="submit">
              <span class="pink-text">Add child</span>
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>

<?php include './includes/footer.php' ?>