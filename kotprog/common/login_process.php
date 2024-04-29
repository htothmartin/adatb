<?php
include_once("db_fuggvenyek.php");
if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $passwd = $_POST['passwd'];

  $errors = [];


  if (!user_exist($username)) {
    $errors[] = "Hibas felhasznalónév vagy jelszó!";
  }

  if (count($errors) == 0 && bejelentkezes($username, $passwd)) {
    echo "Sikeres bejelentkezés!";
    session_start();
    $_SESSION["username"] = $username;
    $_SESSION['message'] = 'Sikeres bejelentkezés!';
    header("Location: ../index.php?page=vendeg");
  } else {
    session_start();
    $errors[] = "Hibas felhasznalónév vagy jelszó!";
    $_SESSION['errors'] = $errors;
    header("Location: ../index.php");
  }
}
