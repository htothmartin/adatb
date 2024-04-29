<?php
include_once("db_fuggvenyek.php");
    vendegTorles($_POST['toroltvendeg']);
    header("Location: ../index.php?page=vendeg");
?>