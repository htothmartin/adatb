<?php
include_once("db_fuggvenyek.php");
session_start();
$nev = $_POST['vendegnev'];
$email = $_POST['vendegemail'];
$tel = $_POST['vendegtelefon'];
$szulev = $_POST['szulev'];
$szulhonap = $_POST['szulhonap'];
$szulnap = $_POST['szulnap'];
$szuldatum = date('Y-m-d', mktime(0,0,0, $szulhonap, $szulnap, $szulev));

if(emailletezik($email)){
    $errors = array();
    $errors[] = "Sikertelen vendég felvétel!";
    $errors[] = "Ez az email már foglalat!";
    $_SESSION['errors'] = $errors;
    header("Location: ../index.php?page=vendeg");
}else if(isset($nev) && isset($email) && isset($tel) && isset($szuldatum)){
    vendeget_felvesz($nev, $email, $tel, $szuldatum);
    header("Location: ../index.php?page=vendeg");
}

?>