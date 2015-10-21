<?php
session_start();
if(isset($_GET["session"]) && $_GET["session"] == "destroy")
{
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
    <title>Oplossing sessions - Pagina 03</title>
    <style>
      input
      {
        display: block;
        margin: 2.5px 0px;
      }
      li>a
      {
        padding-left:10px;
      }
    </style>
  </head>
  <body>
    <h1>Oplossing sessions</h1>
    <a href="?session=destroy">Vernietig sessie.</a>
    <h2>Overzichtspagina</h2>
    <ul>
      <li>E-mail: <?= $_SESSION["email"] ?><a href="sessions-pagina-01-registratie.php?focus=email">Wijzig</a></li>
      <li>Nickname: <?= $_SESSION["nickname"] ?><a href="sessions-pagina-01-registratie.php?focus=nickname">Wijzig</a></li>
      <li>Straat: <?= $_SESSION["straat"] ?><a href="sessions-pagina-02-adres.php?focus=straat">Wijzig</a></li>
      <li>Nummer: <?= $_SESSION["nummer"] ?><a href="sessions-pagina-02-adres.php?focus=nummer">Wijzig</a></li>
      <li>Gemeente: <?= $_SESSION["gemeente"] ?><a href="sessions-pagina-02-adres.php?focus=gemeente">Wijzig</a></li>
      <li>Postcode: <?= $_SESSION["postcode"] ?><a href="sessions-pagina-02-adres.php?focus=postcode">Wijzig</a></li>
    </ul>
    </form>
  </body>
</html>