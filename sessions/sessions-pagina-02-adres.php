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
setSessionVar("straat");
setSessionVar("nummer");
setSessionVar("gemeente");
setSessionVar("postcode");

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Oplossing sessions - Pagina 02</title>
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
    <h2>Registratiegegevens</h2>
    <ul>
      <li>E-mail: <?= $_SESSION["email"] ?></li>
      <li>Nickname: <?= $_SESSION["nickname"] ?></li>
    </ul>
    <h2>Deel 2: adres</h2>
    <form method="post" action="sessions-pagina-03-overzicht.php">
      <label for="straat">Straat:</label><input type="text" name="straat" id="straat" value="<?= $_SESSION["straat"] ?>" <?= (isset($_GET["focus"]) && $_GET["focus"] == "straat") ? "autofocus" : '' ?>>
      <label for="nummer">Nummer: </label><input type="number" name="nummer" id="nummer" value="<?= $_SESSION["nummer"] ?>" <?= (isset($_GET["focus"]) && $_GET["focus"] == "nummer") ? "autofocus" : '' ?>>
      <label for="gemeente">Gemeente:</label><input type="text" name="gemeente" id="gemeente" value="<?= $_SESSION["gemeente"] ?>" <?= (isset($_GET["focus"]) && $_GET["focus"] == "gemeente") ? "autofocus" : '' ?>>
      <label for="postcode">Postcode:</label><input type="text" name="postcode" id="postcode" value="<?= $_SESSION["postcode"] ?>" <?= (isset($_GET["focus"]) && $_GET["focus"] == "postcode") ? "autofocus" : '' ?>>
      <input type="submit" value="Volgende >" name="submit">
    </form>
  </body>
</html>