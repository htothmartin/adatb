<?php
include_once("db_fuggvenyek.php");
if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $passwd = $_POST['passwd'];
  unset($_SESSION['errors']);
  $errors = [];


  if (!user_exist($username)) {
    $errors[] = "Hibás felhasznalónév vagy jelszó!";
  }

  if (count($errors) == 0 && bejelentkezes($username, $passwd)) {
    session_start();
    $_SESSION["username"] = $username;
    $_SESSION['message'] = 'Sikeres bejelentkezés!';
    header("Location: ../index.php?page=vendeg");
  } else {
    session_start();
    $_SESSION['errors'] = $errors;
    header("Location: ../index.php");
  }
}
