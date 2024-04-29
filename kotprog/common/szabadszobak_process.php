<?php
include_once("db_fuggvenyek.php");
$vendeg = $_POST['valasztottVendeg'];
$sztipus = $_POST['szobatipus'];
$mev = $_POST['mettolev'];
$mhonap = $_POST['mettolhonap'];
$mnap = $_POST['mettolnap'];
$mettoldatum = date('Y-m-d', mktime(0,0,0, $mhonap, $mnap, $mev));
$gev = $_POST['meddigev'];
$ghonap = $_POST['meddighonap'];
$gnap = $_POST['meddignap'];
$meddigdatum = date('Y-m-d', mktime(0,0,0, $ghonap, $gnap, $gev));

$szabadszobak = szabadszobakatLeker($sztipus, $mettoldatum, $meddigdatum);
$szobak = array();
while ($szoba = mysqli_fetch_assoc($szabadszobak)) {
    $szobak[] = $szoba;
}
mysqli_free_result($szabadszobak);
$mettol = new DateTime($meddigdatum);
$meddig = new DateTime($mettoldatum);

$interval = $meddig->diff($mettol);

session_start();
$_SESSION['szabadszobak'] = $szobak;
$_SESSION['vendeg'] = $vendeg;
$_SESSION['mettol'] = $mettoldatum;
$_SESSION['meddig'] = $meddigdatum;
$_SESSION['szobatipus'] = $sztipus;
$_SESSION['mettolev'] = $mev;
$_SESSION['mettolhonap'] = $mhonap;
$_SESSION['mettolnap'] = $mnap;
$_SESSION['meddigev'] = $gev;
$_SESSION['meddighonap'] = $ghonap;
$_SESSION['meddignap'] = $gnap;
$_SESSION['interval'] = $interval;


if(isset($_POST['modositas'])){
    header("Location: ../index.php?page=foglalasmodosit");
} else {
    header("Location: ../index.php?page=foglalas");
}


?>