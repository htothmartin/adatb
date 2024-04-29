<div class="form-container">
  <h2>Vendgék felvétele</h2>
  <form method="POST" action="common/vendegfelvetel.php" accept-charset="utf-8">
    <label>Vendgég neve: </label>
    <input type="text" name="vendegnev" required/>
    <br>
    <label>Email cim: </label>
    <input type="email" name="vendegemail" required/>
    <br>
    <label>Telefonszám: </label>
    <input type="text" name="vendegtelefon" required/>
    <br>
    <label>Születési dátum: </label>
    <select name="szulev" required>
    <?php
    for ($i = 1900; $i <= date("Y"); $i++) {
      echo '<option value="' . $i . '">' . $i . '</option>';
    }
    ?>
    </select> év

    <select name="szulhonap" required>
    <?php
    for ($i = 1; $i <= 12; $i++) {
      echo '<option value="' . $i . '">' . $i . '</option>';
    }
    ?>
    </select> hónap

    <select name="szulnap" required>
    <?php
    for ($i = 1; $i <= 31; $i++) {
      echo '<option value="' . $i . '">' . $i . '</option>';
    }
    ?>
    </select> nap
    <br>
    <input type="submit" value="Elküld" />
  </form>
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
<div>
  <h2>Vendégek</h2>
  <table>
    <tr>
      <th>VendegID</th>
      <th>Név</th>
      <th>Email</th>
      <th>Telefonszám</th>
      <th>Születési Dátum</th>
      <th>Törlés</th>
    </tr>

    <?php
    $vendegek = vendegeketLeker();

    while ($vendeg = mysqli_fetch_assoc($vendegek)) {
      echo "<tr>";
      echo "<td>" . $vendeg['vendegid'] . "</td>";
      echo "<td>" . $vendeg['nev'] . "</td>";
      echo "<td>" . $vendeg['email'] . "</td>";
      echo "<td>" . $vendeg['telefonszam'] . "</td>";
      echo "<td>" . $vendeg['szuletesidatum'] . "</td>";
      echo '<td><form method="POST" action="common/vendegtorles.php">
				  <input type="hidden" name="toroltvendeg" value="'.$vendeg["vendegid"].'" />
				  <input type="submit" value="Törlés" />
		          </form></td>';
      echo "</tr>";
    }
    mysqli_free_result($vendegek);
    ?>
  </table>
</div>
<div>
  <h2>Legidősebb Vendég kifizetett foglalások</h2>
  <table>
    <tr>
      <th>Név</th>
      <th>Összeg</th>
    </tr>

    <?php
    $legidosebbvendeg = legidosebbvendegLeker();

    while ($vendeg = mysqli_fetch_assoc($legidosebbvendeg)) {
      echo "<tr>";
      echo "<td>" . $vendeg['nev'] . "</td>";
      echo "<td>" . $vendeg['osszesen'] . " Ft</td>";
      echo "</tr>";
    }
    mysqli_free_result($legidosebbvendeg);
    ?>
  </table>
</div>