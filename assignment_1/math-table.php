<?php include './includes/header.php' ?>

<main>
  <article>
    <h2>Red blooded Americans love math</h2>
    <!-- super global; type is associative array (like a dictionary) -->
    <!-- change $size variable in the query string -->
    
    <table>
      <?php for ($j = 0; $j < 12; $j++): ?>
        <tr>
          <?php for ($i = 0; $i < 12; $i++): ?>
            <td><?= ($i + 1) * ($j + 1); ?></td>
          <?php endfor ?>
        </tr>
      <?php endfor ?>
    </table>
  </article>
</main>

<?php include './includes/footer.php' ?>