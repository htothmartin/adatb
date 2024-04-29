<?php
include_once("db_fuggvenyek.php");
session_start();
$vendegid = $_POST['vendegid'];
$mettol = $_SESSION['mettol'];
$meddig = $_SESSION['meddig'];
$torolszobaszam = $_POST['regiszobaszam'];
$torolmettol = $_POST['mettol'];
unset($_SESSION['vendegid']);
unset($_SESSION['mettol']);
unset($_SESSION['meddig']);
unset($_SESSION['mettolev']);
unset($_SESSION['meddigev']);
unset($_SESSION['mettolhonap']);
unset($_SESSION['meddighonap']);
unset($_SESSION['mettolnap']);
unset($_SESSION['meddignap']);
$szobaszam = $_POST['szobaszam'];
echo($vendegid);
echo($torolmettol);
echo($torolszobaszam);
echo(foglalasTorles($torolszobaszam, $torolmettol));

foglalas($vendegid, $szobaszam, $mettol, $meddig);

header("Location: ../index.php?page=foglalasok");



