<?php
include_once("db_fuggvenyek.php");
session_start();
$vendegid = $_SESSION['vendeg'];
$mettol = $_SESSION['mettol'];
$meddig = $_SESSION['meddig'];
unset($_SESSION['vendeg']);
unset($_SESSION['mettol']);
unset($_SESSION['meddig']);
unset($_SESSION['mettolev']);
unset($_SESSION['meddigev']);
unset($_SESSION['mettolhonap']);
unset($_SESSION['meddighonap']);
unset($_SESSION['mettolnap']);
unset($_SESSION['meddignap']);
$szobaszam = $_POST['szobaszam'];

foglalas($vendegid, $szobaszam, $mettol, $meddig);

header("Location: ../index.php?page=foglalas");



