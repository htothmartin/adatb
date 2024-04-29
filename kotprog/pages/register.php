<div class="grid-container">
  <div class="form-container grid-item">
    <h2>Regisztráció</h2>
    <form method="POST" action="common/regisztracio_feldolgozas.php" accept-charset="utf-8">
      <label>Felhasználónév: </label>
      <input type="text" name="username" value="<?php if(isset($_SESSION['reg_username'])) echo($_SESSION['reg_username'])?>" required maxlength="25"/>
      <br>
      <label>Jelszó: </label>
      <input type="password" name="passwd" required/>
      <br>
      <label>Jelszó mégegyszer: </label>
      <input type="password" name="passwd2" required />
      <br>
      <label>Teljes név: </label>
      <input type="text" name="fullname" value="<?php if(isset($_SESSION['reg_fullname'])) echo($_SESSION['reg_fullname'])?>" required maxlength="50"/>
      <br>
      <input type="submit" name="register" value="Regisztráció" />
    </form>
    <a href="index.php?page=login">Bejelentkezés</a>
    <?php
    if (isset($_SESSION['errors'])) {
      unset($_SESSION['reg_username']);
      unset($_SESSION['reg_fullname']);
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