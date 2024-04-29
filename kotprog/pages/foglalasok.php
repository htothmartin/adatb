  <?php
  if (isset($_POST['torles'])) {
    foglalasTorles($_POST['szobaszam'], $_POST['mettol']);
    header("Refresh: 0");
  }

  ?>

  <h2>Foglalások</h2>
  <table>
    <tr>
      <th>Vendég</th>
      <th>VendégID</th>
      <th>Szobaszám</th>
      <th>Szobatipus</th>
      <th>Mettől</th>
      <th>Meddig</th>
      <th>Módosítas</th>
      <th>Törlés</th>
    </tr>

    <?php
    $foglalasok = foglalasokatLeker();

    while ($foglalas = mysqli_fetch_assoc($foglalasok)) {
      echo "<tr>";
      echo "<td>" . $foglalas['nev'] . "</td>";
      echo "<td>" . $foglalas['vendegid'] . "</td>";
      echo "<td>" . $foglalas['szobaszam'] . "</td>";
      echo "<td>" . $foglalas['megnevezes'] . "</td>";
      echo "<td>" . $foglalas['mettol'] . "</td>";
      echo "<td>" . $foglalas['meddig'] . "</td>";
      echo '<td><form method="POST" action="index.php?page=foglalasmodosit">
				  <input type="hidden" name="vendegid" value="' . $foglalas["vendegid"] . '" />
          <input type="hidden" name="szobaszam" value="' . $foglalas["szobaszam"] . '" />
          <input type="hidden" name="mettol" value="' . $foglalas["mettol"] . '" />
          <input type="hidden" name="meddig" value="' . $foglalas["meddig"] . '" />
          <input type="hidden" name="megnevezes" value="' . $foglalas["megnevezes"] . '" />
				  <input type="submit" name="modosit" value="Módosít" />
		          </form></td>';
      echo '<td><form method="POST">
              <input type="hidden" name="szobaszam" value="' . $foglalas["szobaszam"] . '" />
              <input type="hidden" name="mettol" value="' . $foglalas["mettol"] . '" />
              <input type="hidden" name="torles" value="" />
              <input type="submit" name="modosit" value="Törlés" />
                  </form></td>';
      echo "</tr>";
    }
    mysqli_free_result($foglalasok);
    ?>

  </table>
  </div>

  <h2>Foglalások legalább 3 fekvőhellyel rendelkező szobákra</h2>
  <table>
    <tr>
      <th>VendegID</th>
      <th>Szobaszám</th>
      <th>Mettől</th>
    </tr>

    <?php
    $harom = haromfekvohely();

    while ($sor = mysqli_fetch_assoc($harom)) {
      echo "<tr>";
      echo "<td>" . $sor['vendegid'] . "</td>";
      echo "<td>" . $sor['szobaszam'] . "</td>";
      echo "<td>" . $sor['mettol'] . "</td>";
      echo "</tr>";
    }

    mysqli_free_result($harom);
    ?>
  </table>
  </div>

  <?php
  if (isset($_POST['foglalas'])) {
    $foglalas = mysqli_fetch_assoc(foglalastLeker($_POST['szobaszam'], $_POST['mettol']));
    echo "<div class='popup form-container'>";
    echo '<form action="common/foglalasmodosit.php" method="POST">
    <label>Vendeg: </label>
    <input type="text" name="" disabled value="' . $foglalas['vendegid'] . '"/>
    <input type="hidden" name="megnevezes" value="' . $foglalas['vendegid'] . '"/>
    <label>Szobaszám: </label>
    <input type="text" name="napiar" value="' . $foglalas['szobaszam'] . '"/>
    <input type="submit" name="modosit" value="Módosít" />
    <input type="submit" class="exit" name="exit" value="Mégse" />
    </form>';

    echo "</div>";
  }
  ?>