<div class="grid-container">
  <div class="form-container grid-item">
    <h2>Bejelentkezés</h2>
    <form method="POST" action="common/bejelentkezes_feldolgozas.php" accept-charset="utf-8">
      <label>Felhasználónév: </label>
      <input type="text" name="username" />
      <br>
      <label>Jelszó: </label>
      <input type="password" name="passwd" />
      <br>
      <input type="submit" name="login" value="Bejelentkezés" />
    </form>
    <a href="index.php?page=register">Regisztráció</a>

    <?php
    if (isset($_SESSION['errors'])) {
      echo '<div class="error center">';
      foreach ($_SESSION['errors'] as $error) {
        echo '<p>' . $error . '</p>';
      }
      echo '</div>';
      unset($_SESSION['errors']);
    }
    ?>
  </div>

</div>