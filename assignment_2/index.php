<?php include('/includes/header.php'); ?>
<h1>Contact</h1>
  <form method="post" action="contact_submit.php">
    <label>
      First name:<br>
      <input type="text" name="first_name">
    </label>
    <label>
      Last name:<br>
      <input type="text" name="last_name">
    </label>
    <label>
      Subject:<br>
      <textarea name="first_name"></textarea>
    </label>
    <input type="submit" name="submit" value="Send">
  </form>
<?php include('/includes/footer.php'); ?>