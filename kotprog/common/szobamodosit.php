<?php
include_once("db_fuggvenyek.php");
if (isset($_POST['exit'])) {
    header("Location: ../index.php?page=szoba");
}

if(isset($_POST['modosit'])){
    $megnevezesid = $_POST['megnevezesid'];
    $ar = $_POST['napiar'];

    napiaratModosit($megnevezesid, $ar);
    header("Location: ../index.php?page=szoba");
}


?>