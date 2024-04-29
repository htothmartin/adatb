<?php

function szalloda_csatlakozas()
{

    $conn = mysqli_connect("localhost", "root", "") or die("Csatlakozasi hiba!");

    mysqli_query($conn, 'SET NAMES UTF8');
    mysqli_query($conn, 'SET character_set_results=utf8');
    mysqli_set_charset($conn, 'utf8');

    if (mysqli_select_db($conn, 'hotel') == false) {
        return null;
    }

    return $conn;
}

function user_exist($username)
{
    if (!($conn = szalloda_csatlakozas())) {
        return false;
    }

    $result = mysqli_query($conn, "SELECT * FROM felhasznalok WHERE felhasznalonev = '$username'");

    if ($result->num_rows == 0) {
        return false;
    } else {
        return true;
    }


    mysqli_close($conn);
    return $result;
}

function regisztracio($username, $passwd, $fullname)
{
    if (!($conn = szalloda_csatlakozas())) {
        return false;
    }

    $stmt = mysqli_prepare($conn, "INSERT INTO felhasznalok VALUES (?, ?, ?)");
    $passwd = password_hash($passwd, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "sss", $username, $fullname, $passwd);

    $sikeres = mysqli_stmt_execute($stmt);


    mysqli_close($conn);

    return $sikeres;
}

function bejelentkezes($username, $passwd)
{
    if (!($conn = szalloda_csatlakozas())) {
        return false;
    }

    $result = mysqli_query($conn, "SELECT * FROM felhasznalok WHERE felhasznalonev = '$username'");
    $user = mysqli_fetch_assoc($result);

    if ($username === $user["felhasznalonev"] && password_verify($passwd, $user["jelszo"])) {
        mysqli_close($conn);
        return true;
    } else {
        mysqli_close($conn);
        return false;
    }
}

function vendeget_felvesz($nev, $email, $telefonszam, $szuldatum)
{
    if (!($conn = szalloda_csatlakozas())) {
        return false;
    }

    do {
        $id = rand(1000, 9999);
    
        $result = mysqli_query($conn, "SELECT * FROM vendegek WHERE vendegid='$id'");
    } while (mysqli_num_rows($result) > 0);

    $stmt = mysqli_prepare($conn, "INSERT INTO vendegek(vendegid, nev, email, telefonszam, szuletesidatum) VALUES (?, ?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "dssss",$id, $nev, $email, $telefonszam, $szuldatum);

    $sikeres = mysqli_stmt_execute($stmt);

    mysqli_close($conn);
    return $sikeres;
}

function emailletezik($email){

    if (!($conn = szalloda_csatlakozas())) {
        return false;
    }

    $result = mysqli_query($conn, "SELECT * FROM vendegek WHERE email='$email'");

    if (mysqli_num_rows($result) > 0) {
        mysqli_close($conn);
        return true;
    } else {
        mysqli_close($conn);
        return false;
    }
}

function vendegeketLeker()
{
    if (!($conn = szalloda_csatlakozas())) {
        return false;
    }

    $result = mysqli_query($conn, "SELECT * FROM vendegek");

    mysqli_close($conn);
    return $result;
}

function vendegTorles($id)
{
    if (!($conn = szalloda_csatlakozas())) {
        return false;
    }
    $stmt = mysqli_prepare($conn, "DELETE FROM vendegek WHERE vendegid = ?");

    mysqli_stmt_bind_param($stmt, "d", $id);

    $sikeres = mysqli_stmt_execute($stmt);

    mysqli_close($conn);
    return $sikeres;
}

function szobatipusLeker()
{
    if (!($conn = szalloda_csatlakozas())) {
        return false;
    }

    $result = mysqli_query($conn, "SELECT * FROM szobatipusok");

    mysqli_close($conn);
    return $result;
}

function szobatleker($megnevezesid)
{
    if (!($conn = szalloda_csatlakozas())) {
        return false;
    }
    $result = mysqli_query($conn, "SELECT * FROM szobatipusok WHERE megnevezesid = '$megnevezesid'");


    mysqli_close($conn);
    return $result;
}
 
function napiaratModosit($megnevezesid, $napiar){
    if (!($conn = szalloda_csatlakozas())) {
        return false;
    }
    $result = mysqli_query($conn, "UPDATE szobatipusok SET napiar = '$napiar' WHERE megnevezesid = '$megnevezesid'");

    mysqli_close($conn);
    return $result;
}

function szabadszobakatLeker($megnevezesid, $mettol, $meddig)
{
    if (!($conn = szalloda_csatlakozas())) {
        return false;
    }
    $result = mysqli_query($conn, "SELECT szobaszam, szobatipusok.megnevezes, napiar 
    FROM szobak,szobatipusok 
    WHERE szobak.megnevezesid = szobatipusok.megnevezesid AND szobak.megnevezesid = '$megnevezesid' AND
     szobaszam NOT IN ( SELECT szobaszam FROM foglalasok WHERE ('$mettol' BETWEEN mettol AND meddig) OR '$meddig' BETWEEN mettol AND meddig)");
        
    mysqli_close($conn);
    return $result;
}

function foglalas($vedegid, $szobaszam, $mettol, $meddig){
    if (!($conn = szalloda_csatlakozas())) {
        return false;
    }

    $stmt = mysqli_prepare($conn, "INSERT INTO foglalasok(vendegid, szobaszam, mettol, meddig) VALUES (?, ?, ?, ?)");

    mysqli_stmt_bind_param($stmt, "ddss", $vedegid, $szobaszam, $mettol, $meddig);

    $sikeres = mysqli_stmt_execute($stmt);

    mysqli_close($conn);
    return $sikeres;
}

function foglalasokatLeker()
{
    if (!($conn = szalloda_csatlakozas())) {
        return false;
    }

    $result = mysqli_query($conn, "SELECT vendegek.nev, vendegek.vendegid, foglalasok.szobaszam, foglalasok.mettol, szobatipusok.megnevezes, foglalasok.meddig FROM foglalasok, vendegek, szobak, szobatipusok WHERE vendegek.vendegid = foglalasok.vendegid AND foglalasok.szobaszam = szobak.szobaszam AND szobak.megnevezesid = szobatipusok.megnevezesid");


    mysqli_close($conn);
    return $result;
}

function foglalastLeker($szobaszam, $mettol){
    if (!($conn = szalloda_csatlakozas())) {
        return false;
    }

    $result = mysqli_query($conn, "SELECT * FROM foglalasok WHERE szobaszam = '$szobaszam' AND mettol = '$mettol'");
        
    mysqli_close($conn);
    return $result;

}

function vendegetLeker($vendegid)
{
    if (!($conn = szalloda_csatlakozas())) {
        return false;
    }

    $result = mysqli_query($conn, "SELECT * FROM vendegek WHERE vendegid='$vendegid'");

    mysqli_close($conn);
    return $result;
}

function foglalasTorles($szobaszam, $mettol){
    if (!($conn = szalloda_csatlakozas())) {
        return false;
    }

    $stmt = mysqli_prepare($conn, "DELETE FROM foglalasok WHERE szobaszam = ? AND mettol = ?");

    mysqli_stmt_bind_param($stmt, "ds", $szobaszam, $mettol);

    $sikeres = mysqli_stmt_execute($stmt);

    mysqli_close($conn);
    if($sikeres)
    return "igen";
}

function uresszobakatLeker()
{
    if (!($conn = szalloda_csatlakozas())) {
        return false;
    }
    $result = mysqli_query($conn, "SELECT szobak.szobaszam, szobatipusok.megnevezes, napiar, fekvohelyekszama FROM szobak, szobatipusok WHERE szobak.megnevezesid = szobatipusok.megnevezesid AND szobak.szobaszam NOT IN (SELECT szobaszam from foglalasok WHERE CURRENT_DATE() BETWEEN mettol AND meddig)");
        
    mysqli_close($conn);
    return $result;
}

function szobatipusdb()
{
    if (!($conn = szalloda_csatlakozas())) {
        return false;
    }
    $result = mysqli_query($conn, "SELECT szobatipusok.megnevezes, COUNT(*) AS darab FROM szobak JOIN szobatipusok ON szobak.megnevezesid = szobatipusok.megnevezesid GROUP BY szobatipusok.megnevezesid");
        
    mysqli_close($conn);
    return $result;
}

function haromfekvohely()
{
    if (!($conn = szalloda_csatlakozas())) {
        return false;
    }
    $result = mysqli_query($conn, "SELECT foglalasok.vendegid, foglalasok.szobaszam, foglalasok.mettol FROM foglalasok JOIN szobak ON foglalasok.szobaszam = szobak.szobaszam JOIN szobatipusok ON szobak.megnevezesid = szobatipusok.megnevezesid WHERE szobatipusok.fekvohelyekszama >= 3 ORDER BY foglalasok.mettol");
        
    mysqli_close($conn);
    return $result;
}

function legidosebbvendegLeker()
{
    if (!($conn = szalloda_csatlakozas())) {
        return false;
    }

    $result = mysqli_query($conn, "SELECT vendegek.nev, SUM(DATEDIFF(foglalasok.meddig, foglalasok.mettol)*szobatipusok.napiar) AS osszesen 
    FROM foglalasok JOIN vendegek ON foglalasok.vendegid = vendegek.vendegid 
    JOIN szobak ON foglalasok.szobaszam = szobak.szobaszam 
    JOIN szobatipusok ON szobak.megnevezesid = szobatipusok.megnevezesid 
    WHERE vendegek.vendegid = ( SELECT vendegid FROM vendegek ORDER BY vendegek.szuletesidatum ASC LIMIT 1 )");

    mysqli_close($conn);
    return $result;
}


