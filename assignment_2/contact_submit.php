<?php include('includes/header.php'); ?>

<h2>Message Sent</h2>

<?php if (isset($_POST['submit'])): ?>

  

  <p>
    <strong>First Name:</strong>
    <?= $_POST['first_name']; ?>
  </p>
  <p>
    <strong>Last Name:</strong>
    <?= $_POST['last_name']; ?>
  </p>
  <p>
    <strong>Subject:</strong>
    <?= $_POST['subject']; ?>
  </p>
  <p>
    <strong>Message:</strong>
    <?= $_POST['message']; ?>
  </p>
<?php else: ?>
  <?php header('Location: index.php'); ?>
<?php endif ?>

<?php include('includes/footer.php'); ?>