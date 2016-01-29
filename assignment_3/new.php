<?php include './includes/header.php' ?>

  <div class="row">
    <div class="col s6 push-s3">
      <h1>New</h1>
    </div>
  </div>
  <div class="row">
    <div class="card col s6 push-s3">
      <div class="card-content">
        <span class="card-title">Do some queries</span>
        <form method="post" action="create.php">
          <div class="input-field">
            Title:
            <input type="text" id="title" name="title">
          </div>
          <div class="input-field">
            Genre:
            <input type="text" id="genre" name="genre">
          </div>
          <div class="input-field">
            Release date:
            <input type="date" class="datepicker" name="date_of_release">
          </div>
          <div class="input-field">
            Console:
            <input type="text" name="console">
          </div>
          <div class="input-field">
            Developer:
            <input type="text" name="developer">
          </div>
          <div class="input-field">
            Rating:
            <p class="range-field">
              <input id="test5" type="range" name="rating" min="0" max="10">
            </p>
          </div>
          <div class="input-field">
            Revenue:
            <input type="number" name="revenue">
          </div>
          <div class="card-action">
            <button class="waves-effect btn teal accent-2" type="submit" name="submit">
              <span class="pink-text">Add to DB</span>
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>

<?php include './includes/footer.php' ?>