<?php include('./includes/header.php'); ?>

<?php 
  if (!isset($_SESSION['num_email_sent']) {
    $_SESSION['num_emails_sent'] = 0; ?>
  }
?>

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
        <h1>Hello $user_first_name</h1>
        <h3>This is the message you sent</h3>
        <p>$user_message</p>
      </body>
      </html>
    ";

    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

    if ($_SESSION['num_emails_sent'] < 5) {
      $_SESSION['num_emails_sent'] +=1;
      $sent = true;
      mail($to, $subject, $message, $headers);
    } else {
      $sent = false;
    }
  ?>
<?php else: ?>
  <?php header('Location: index.php'); ?>
<?php endif ?>

<div class="row">
  <div class="card col s6 push-s3">
    <div class="card-content">
      <?php if ($sent): ?>
      <span class="card-title">Message sent</span>
      <?php else: ?>
      <span class="card-title">Message not sent, too many emails</span>
      <?php endif ?>
      <div class="card-content">
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
        <div class="card-action">
          <a class="waves-effect btn blue accent-1" href="index.php">Back to home page</a>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include('./includes/footer.php'); ?>