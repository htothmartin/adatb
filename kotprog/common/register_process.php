<?php
include_once("db_fuggvenyek.php");
if(isset($_POST['register'])){
  $username = $_POST['username'];
  $passwd = $_POST['passwd'];
  $passwd2 = $_POST['passwd2'];
  $lastname = $_POST['lastname'];
  $firstname = $_POST['firstname'];

  $errors = [];

  if(trim($passwd) != trim($passwd2)){
    $errors[] = "A jelszavak nem egyeznek meg!";
  }
  if(user_exist($username)){
    $errors[] = "Ez a felhasználónév már fogalalt!";
  }

  if(count($errors) == 0 && regisztracio($username, $passwd, $lastname, $firstname)){
    session_start();
    $_SESSION['message'] = 'Sikeres regisztráció, kérjük jelentkezzen be!';
    header("Location: ../index.php?page=login");

  } else {
    session_start();
    $_SESSION['errors'] = $errors;
    header("Location: ../index.php?page=register");
  }
}
?>