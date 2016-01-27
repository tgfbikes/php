<?php include('./includes/header.php'); ?>
  <?php
    if (isset($_SESSION['first_name'])) {
      $first_name = $_SESSION['first_name'];
    }
  ?>

  <div class="row">
    <div class="card col s6 push-s3">
      <div class="card-content">
        <?php if (isset($first_name)): ?>
          <span class="card-title">Would you like to send another email <?= $first_name ?>?</span>
        <?php else: ?>
          <span class="card-title">Send us an email</span>
        <?php endif ?>
        <form method="post" action="contact_submit.php">
          <div class="row">
            <div class="input-field col s6">
              <input placeholder="First name" type="text" id="first_name" name="first_name" class="validate">
            </div>
            <div class="input-field col s6">
              <input placeholder="Last name" type="text" id="last_name" name="last_name" class="validate">
            </div>
          </div>
          <div class="input-field">
            <input placeholder="Subject" type="text" name="subject" class="validate">
          </div>
          <div class="input-field">
            <textarea placeholder="Your message you would like to send" id="textarea" class="materialize-textarea" name="message"></textarea>
          </div>
          <div class="card-action">
            <button class="waves-effect btn blue accent-1" type="submit" name="submit">Submit email</button>
          </div>
        </form>
      </div>
    </div>
  </div>

<?php include('./includes/footer.php'); ?>