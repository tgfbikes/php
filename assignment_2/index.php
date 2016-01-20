<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Forms</title>
  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">
  <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
</head>
<body>
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
</body>
</html>