<div class="form-container">
    <h2>Foglalás</h2>
    <form method="POST" action="common/szabadszobak_lekerdez.php" accept-charset="utf-8">
        <label>Vendég: </label>
        <select name="valasztottVendeg">
            <?php
            $vendegek = vendegeketLeker();
            while ($vendeg = mysqli_fetch_assoc($vendegek)) {
                if (isset($_SESSION['vendeg']) && $_SESSION['vendeg'] == $vendeg['vendegid']) {
                    echo '<option selected value="' . $vendeg["vendegid"] . '">' . ' VendegID: ' . $vendeg["vendegid"] . ' - ' . $vendeg["nev"] . ' Email: ' . $vendeg['email'] . '</option>';
                } else {
                    echo '<option value="' . $vendeg["vendegid"] . '">' . ' VendegID: ' . $vendeg["vendegid"] . ' - ' . $vendeg["nev"] . ' Email: ' . $vendeg['email'] . '</option>';
                }
            }
            mysqli_free_result($vendegek);

            ?>
        </select>
        <br>
        <label>Szoba Típus: </label>
        <select id="szobaSelect" name="szobatipusid">
            <?php
            $tipusok = szobatipusLeker();
            while ($tipus = mysqli_fetch_assoc($tipusok)) {
                if (isset($_SESSION['szobatipusid']) && $_SESSION['szobatipusid'] == $tipus["megnevezesid"]) {
                    echo '<option selected value="' . $tipus["megnevezesid"] . '">' .
                        $tipus["megnevezes"] . ' - Napi Ár: ' .
                        $tipus["napiar"] . ' - Fekvőhelyek: ' .
                        $tipus["fekvohelyekszama"] . '</option>';
                } else {
                    echo '<option value="' . $tipus["megnevezesid"] . '">' .
                        $tipus["megnevezes"] . ' - Napi Ár: ' .
                        $tipus["napiar"] . ' - Fekvohelyek: ' .
                        $tipus["fekvohelyekszama"] . '</option>';
                }
            }
            mysqli_free_result($tipusok);

            ?>
        </select>
        <br>
        <label>Mettől: </label>

        <select name="mettolev">
            <?php
            for ($i = date("Y"); $i < 2100; $i++) {
                if (isset($_SESSION['mettolev']) && $_SESSION['mettolev'] == $i) {
                    echo '<option selected value="' . $i . '">' . $i . '</option>';
                } else echo '<option value="' . $i . '">' . $i . '</option>';
            }
            ?>
        </select> év

        <select name="mettolhonap">
            <?php
            for ($i = 1; $i <= 12; $i++) {
                if (isset($_SESSION['mettolhonap'])) {
                    if ($_SESSION['mettolhonap'] == $i) {
                        echo '<option selected value="' . $i . '">' . $i . '</option>';
                    } else {
                        echo '<option value="' . $i . '">' . $i . '</option>';
                    }
                } else {

                    if ($i == date("m")) {
                        echo '<option selected value="' . $i . '">' . $i . '</option>';
                    } else {
                        echo '<option value="' . $i . '">' . $i . '</option>';
                    }
                }
            }
            ?>
        </select> hónap

        <select name="mettolnap">
            <?php
            for ($i = 1; $i <= 31; $i++) {
                if (isset($_SESSION['mettolnap'])) {
                    if ($_SESSION['mettolnap'] == $i) {
                        echo '<option selected value="' . $i . '">' . $i . '</option>';
                    } else {
                        echo '<option value="' . $i . '">' . $i . '</option>';
                    }
                } else {

                    if ($i == date("d")) {
                        echo '<option selected value="' . $i . '">' . $i . '</option>';
                    } else {
                        echo '<option value="' . $i . '">' . $i . '</option>';
                    }
                }
            }
            ?>
        </select> nap
        <br>
        <label>Meddig: </label>

        <select name="meddigev">
            <?php
            for ($i = date("Y"); $i < 2100; $i++) {
                if (isset($_SESSION['meddigev']) && $_SESSION['meddigev'] == $i) {
                    echo '<option selected value="' . $i . '">' . $i . '</option>';
                } else echo '<option value="' . $i . '">' . $i . '</option>';
            }
            ?>
        </select> év

        <select name="meddighonap">
            <?php
            for ($i = 1; $i <= 12; $i++) {
                if (isset($_SESSION['meddighonap'])) {
                    if ($_SESSION['meddighonap'] == $i) {
                        echo '<option selected value="' . $i . '">' . $i . '</option>';
                    } else {
                        echo '<option value="' . $i . '">' . $i . '</option>';
                    }
                } else {

                    if ($i == date("m")) {
                        echo '<option selected value="' . $i . '">' . $i . '</option>';
                    } else {
                        echo '<option value="' . $i . '">' . $i . '</option>';
                    }
                }
            }
            ?>
        </select> hónap
        <select name="meddignap">
            <?php
            for ($i = 1; $i <= 31; $i++) {
                if (isset($_SESSION['meddignap'])) {
                    if ($_SESSION['meddignap'] == $i) {
                        echo '<option selected value="' . $i . '">' . $i . '</option>';
                    } else {
                        echo '<option value="' . $i . '">' . $i . '</option>';
                    }
                } else {

                    if ($i == date("d")+1) {
                        echo '<option selected value="' . $i . '">' . $i . '</option>';
                    } else {
                        echo '<option value="' . $i . '">' . $i . '</option>';
                    }
                }
            }
            ?>
        </select> nap
        <br>

        <input type="submit" name="lekerdez" value="Szabad szobakákat lekérdez" />
    </form>
</div>
<?php

if (isset($_SESSION['szabadszobak']) && $_SESSION['interval']->days > 0) {
    if (count($_SESSION['szabadszobak'])) {
?>
        <div>
            <h2>Szabad Szobák</h2>
            <table>
                <tr>
                    <th>Szobaszám</th>
                    <th>Név</th>
                    <th>Fizetendő</th>
                    <th>Foglalas</th>

                </tr>

                <?php

                foreach ($_SESSION['szabadszobak'] as $sz) {

                    echo "<tr>";
                    echo "<td>" . $sz['szobaszam'] . "</td>";
                    echo "<td>" . $sz['megnevezes'] . "</td>";
                    echo "<td>" . $_SESSION['interval']->days*$sz['napiar'] .  " FT</td>";
                    echo '<td><form method="POST" action="common/foglalas_feldolgozas.php">
				  <input type="hidden" name="szobaszam" value="' . $sz["szobaszam"] . '" />
				  <input type="submit" value="Foglalás" />
		          </form></td>';
                    echo "</tr>";
                }
                unset($_SESSION['szabadszobak']);

                ?>



            </table>


        </div>
    <?php
    } else {
        echo "<h2>Nincs szabad szoba az adott intervallumban.</h2>";
    }
    ?>

<?php
}  else {
    echo "<h2>Legalább egy napra kell szobát foglalni.</h2>";
}


?>