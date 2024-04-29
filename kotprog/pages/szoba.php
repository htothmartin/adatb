<div>
    <h2>Szobatípusok</h2>
    <table>
        <tr>
            <th>Megnevezés</th>
            <th>Leiras</th>
            <th>Napiár</th>
            <th>Fekvőhelyek száma</th>
            <th>Módosít</th>
        </tr>

        <?php
        $szobatipusok = szobatipusLeker();

        while ($tipus = mysqli_fetch_assoc($szobatipusok)) {
            echo "<tr>";
            echo "<td>" . $tipus['megnevezes'] . "</td>";
            echo "<td>" . $tipus['leiras'] . "</td>";
            echo "<td>" . $tipus['napiar'] . " Ft </td>";
            echo "<td>" . $tipus['fekvohelyekszama'] . "</td>";
            echo '<td><form method="POST">
            <input type="hidden" name="szobamegnevezesid" value="' . $tipus["megnevezesid"] . '" />
				  <input type="submit" name="szoba" value="Módosít" />
		          </form></td>';
            echo "</tr>";
        }
        mysqli_free_result($szobatipusok);
        ?>
    </table>
</div>
<div>
<div>
<h2>Szobatípusok száma</h2>
    <table>
        <tr>
            <th>Szobatípus</th>
            <th>Darab</th>
        </tr>

        <?php
        $tipus = szobatipusdb();

        while ($sor = mysqli_fetch_assoc($tipus)) {
            echo "<tr>";
            echo "<td>" . $sor['megnevezes'] . "</td>";
            echo "<td>" . $sor['darab'] . "</td>";
            echo "</tr>";
        }

        mysqli_free_result($tipus);
        ?>
    </table>
</div>

<h2>Szabad szobák</h2>
    <table>
        <tr>
            <th>Szobaszám</th>
            <th>Típus</th>
            <th>Napiár</th>
            <th>Ferőhelyek száma</th>
        </tr>

        <?php
        $ures = uresszobakatLeker();

        while ($sor = mysqli_fetch_assoc($ures)) {
            echo "<tr>";
            echo "<td>" . $sor['szobaszam'] . "</td>";
            echo "<td>" . $sor['megnevezes'] . "</td>";
            echo "<td>" . $sor['napiar'] . " Ft</td>";
            echo "<td>" . $sor['fekvohelyekszama'] . "</td>";
            echo "</tr>";
        }

        mysqli_free_result($ures);
        ?>
    </table>
</div>

<?php
if (isset($_POST['szoba'])) {
    $szoba = mysqli_fetch_assoc(szobatleker($_POST['szobamegnevezesid']));
    echo "<div class='popup form-container'>";
    echo '<form action="common/szobamodosit.php" method="POST">
    <label>Megnevezes: </label>
    <input type="text" name="" disabled value="' . $szoba['megnevezes'] . '"/>
    <input type="hidden" name="megnevezesid" value="' . $szoba['megnevezesid'] . '"/>
    <label>Napi ár: </label>
    <input type="text" name="napiar" value="' . $szoba['napiar'] . '"/>
    <input type="submit" name="modosit" value="Módosít" />
    <input type="submit" class="exit" name="exit" value="Mégse" />
    </form>';

    echo "</div>";
}
?>