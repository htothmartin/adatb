<?php
include_once("db_fuggvenyek.php");
if(isset($_POST['register'])){
  $username = $_POST['username'];
  $passwd = $_POST['passwd'];
  $passwd2 = $_POST['passwd2'];
  $fullname = $_POST['fullname'];

  $errors = [];

  if(trim($passwd) != trim($passwd2)){
    $errors[] = "A jelszavak nem egyeznek meg!";
  }
  if(user_exist($username)){
    $errors[] = "Ez a felhasználónév már fogalalt!";
  }

  if(count($errors) == 0 && regisztracio($username, $passwd, $fullname)){
    session_start();
    $_SESSION['message'] = 'Sikeres regisztráció, kérjük jelentkezzen be!';
    header("Location: ../index.php?page=login");

  } else {
    session_start();
    $_SESSION['errors'] = $errors;
    $_SESSION['reg_username'] = $username;
    $_SESSION['reg_fullname'] = $fullname;
    header("Location: ../index.php?page=register");
  }
}
?>