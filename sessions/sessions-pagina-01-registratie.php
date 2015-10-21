<?php
session_start();

if(isset($_GET["session"]) && $_GET["session"] == "destroy")
{
  session_unset();
  session_destroy();
}

function setSessionVar($key)
{
  if(isset($_POST[$key]))
  {
    $_SESSION[$key] = $_POST[$key];
  }
  else if (!isset($_SESSION[$key]))
  {
    $_SESSION[$key] = "";
  }
}

setSessionVar("email");
setSessionVar("nickname");

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Oplossing sessions - Pagina 01</title>
    <style>
      input
      {
        display: block;
        margin: 2.5px 0px;
      }
    </style>
  </head>
  <body>
    <h1>Oplossing sessions</h1>
    <a href="?session=destroy">Vernietig sessie.</a>
    <h2>Deel 1: registratiegegevens</h2>
    <form method="post" action="sessions-pagina-02-adres.php">
      <label for="email">Uw e-mail: </label><input type="email" name="email" id="email" value="<?= $_SESSION["email"] ?>" <?= (isset($_GET["focus"]) && $_GET["focus"] == "email") ? "autofocus" : '' ?>>
      <label for="nickname">Uw nickname: </label><input type="text" name="nickname" id="nickname" value="<?= $_SESSION["nickname"] ?>" <?= (isset($_GET["focus"]) && $_GET["focus"] == "nickname") ? "autofocus" : '' ?>>
      <input type="submit" value="Volgende >" name="submit">
    </form>
  </body>
</html>