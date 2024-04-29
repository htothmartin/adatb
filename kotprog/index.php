<?php
session_start();
include_once("common/db_fuggvenyek.php");
$page = $_GET["page"] ?? "login";
switch ($page) {
  case "index":
    $prefix = "Hotel Kezezelőfelület";
    break;
  case "register":
    $prefix = "Hotel Kezezelőfelület Regisztráció";
    break;
  case "vendeg":
    $prefix = "Vendég";
    break;
  case "szoba":
    $prefix = "Szobák";
    break;
  case "foglalas":
    $prefix = "Foglalás";
    break;
    case "foglalasok":
      $prefix = "Foglalások";
      break;
  case "profile":
    $prefix = "Profil";
    break;
  case "register":
    $prefix = "Regisztráció";
    break;
  case "foglalasmodosit":
    $prefix = "Foglalás módosítás";
    break;
  default:
    $prefix = "Hotel Kezezelőfelület";
}

?>

<!DOCTYPE html>
<html lang="hu">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $prefix; ?></title>
  <link rel="stylesheet" href="./style.css">
</head>

<body>
  <main class="center">
    <h1><?php echo $prefix; ?></h1>
    <?php
    if (!isset($_SESSION["username"])) {
    ?>
      <style>
        body {
          background-image: url("./img/hotel.jpg");
          background-position: center;
          background-repeat: no-repeat;
          background-size: cover;
          background-attachment: fixed;
          height: 100vh;
          margin: 0;
          overflow: hidden;
        }
      </style>
      <?php
      if (isset($_SESSION['message'])) {
        echo '<p class="message">' . $_SESSION['message'] . '</p>';
        unset($_SESSION['message']);
      }

      include_once("pages/$page.php");
    } else {
      ?>
      <nav>
        <ul>
          <li>
            <a href="index.php?page=vendeg">Vendégek</a>
          </li>
          <li>
            <a href="index.php?page=szoba">Szobák</a>
          </li>
          <li>
            <a href="index.php?page=foglalas">Foglalás</a>
          </li>
          <li>
            <a href="index.php?page=foglalasok">Foglalások</a>
          </li>
          <li>
            <a href="common/logout.php">Kijelentkezés</a>
          </li>
        </ul>
      </nav>
    <?php
    }
    include_once "pages/$page.php"
    ?>




  </main>
</body>

</html>