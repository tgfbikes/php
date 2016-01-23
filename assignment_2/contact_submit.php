<?php include('./includes/header.php'); ?>

<h2>Message Sent</h2>

<?php if (isset($_POST['submit'])): ?>

  <?php
    $user_first_name = $_POST['first_name'];
    $user_last_name = $_POST['last_name'];
    $user_subject = $_POST['subject'];
    $user_message = $_POST['message'];

    $to = 'stvking17@gmail.com';
    $subject = "New Message: $user_subject";
    $message = "
      <html>
      <head>
        <title>Success</title>
      </head>
      <body>
        <h1>Hello $user_name</h1>
        <h3>This is the message you sent</h3>
        <p>$user_message</p>
      </body>
      </html>
    ";

    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers = 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

    mail($to, $subject, $message, $headers);
  ?>

  <p>
    <strong>First Name:</strong>
    <?= $user_first_name ?>
  </p>
  <p>
    <strong>Last Name:</strong>
    <?= $user_last_name ?>
  </p>
  <p>
    <strong>Subject:</strong>
    <?= $user_subject ?>
  </p>
  <p>
    <strong>Message:</strong>
    <?= $user_message ?>
  </p>
<?php else: ?>
  <?php header('Location: index.php'); ?>
<?php endif ?>

<?php include('./includes/footer.php'); ?>