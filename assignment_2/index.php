<?php include('./includes/header.php'); ?>
<h1>Contact</h1>
  <form method="post" action="contact_submit.php">
    <div class="input-field">
      <input type="text" id="first_name" name="first_name">
      <label for="first_name">First name</label>
    </div>
    <div class="input-field">
      <input type="text" id="last_name" name="last_name">
      <label for="last_name">Last name</label>
    </div>
    <div class="input-field">
      <textarea id="textarea" name="message"></textarea>
      <label for="textarea">Message</label>
    </div>
    <input class="waves-effect waves-light btn" type="submit" name="submit" value="Send email">
  </form>
<?php include('./includes/footer.php'); ?>