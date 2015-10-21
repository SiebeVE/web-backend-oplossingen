<?php
//array maken van gebruikers en passwords
$users = json_decode(file_get_contents("gebruikers.txt"), true);

if(isset($_GET["afmelden"]) && $_GET["afmelden"] == "nu")
{
  //afmelden
  setcookie("usernaam", "", time()-3600);
  header("Location: cookies.php");
}

function in_array_r($needle, $haystack)
{
  //checken of in array, recursief
  foreach ($haystack as $item)
  {
    if($item == $needle)
    {
      //needle is in haystack
      return true;
    }
    if(is_array($item))
    {
      //item is nog is arracy, nog is uitvoeren
      if(in_array_r($needle, $item))
      {
        //needle is in array item
        return true;
      }
    }
  }
  return false;
}

$verkeerdeInput = false;
$ingelogd = false;

if(isset($_POST["submit"]))
{
  //checken of formulier is ingestuurd
  if(isset($_POST["user"]) && in_array_r($_POST["user"], $users) && isset($_POST["w8woord"]) && in_array_r($_POST["w8woord"], $users))
  {
    //gebruikers naam en wachtwoord is correct
    $ingelogd = true;
    $tijd = 0;
    if(isset($_POST["onthoud"]) && $_POST["onthoud"])
    {
      $tijd = time() + (60*60*24*30);
    }
    setcookie("usernaam", $_POST["user"], $tijd);
    header("Location: cookies.php");
  }
  else
  {
    $verkeerdeInput = true;
  }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Oplossing cookies</title>
    <style>
      input:not([type="checkbox"])
      {
        display: block;
        margin: 2.5px 0px;
      }
      p:not(.ok)
      {
        background-color:#d97c7c;
        padding: 10px;
        border-radius: 5px;
        border: 1px solid #953737;
      }
      .hide
      {
        display: none;
      }
    </style>
  </head>
  <body>
    <h1>Oplossing cookies</h1>
    <?php if ($ingelogd || (isset($_COOKIE["usernaam"]) && in_array_r($_COOKIE["usernaam"], $users))):?>
      <h2>Dashboard</h2>
      <p class="ok">Hallo <?= $_COOKIE["usernaam"] ?>, fijn dat je er weer bij bent</p>
      <a href="?afmelden=nu">Uitloggen</a>
    <?php else: ?>
      <h2>Inloggen</h2>
      <p class="<?= (!$verkeerdeInput)? "hide" : "" ?> ">Gebruikersnaam en/of wachtwoord niet correct. Probeer opnieuw.</p>
      <form method="post">
        <label for="user">Gebruikersnaam</label>
        <input type="text" name="user" id="user">
        <label for="w8woord">Wachtwoord</label>
        <input type="password" name="w8woord" id="w8woord">
        <input type="checkbox" name="onthoud" id="onthoud" value="true"><label for="onthoud">Mij onthouden</label>
        <input type="submit" value="Inloggen" name="submit">
      </form>
    <?php endif ?>
  </body>
</html>