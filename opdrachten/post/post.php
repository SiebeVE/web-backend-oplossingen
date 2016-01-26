<?php
$password = "azerty";
$username = "Siebe";
$welkom_message = "Welkom";

if (isset($_POST["submit"]))
{
  if ($password == $_POST["w8woord"] && $username == $_POST["naam"])
  {
    $message = $welkom_message;
  }
  else
  {
    $message = "Er ging iets mis bij het inloggen, probeer opnieuw";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Oplossing post</title>
    <style>
    input
    {
      display: block;
      margin: 2.5px 0px;
    }
    </style>
  </head>
  <body>
    <h1>Oplossing post</h1>
    <?php if(isset($message) && $message == $welkom_message): ?>
    <h2><?php echo $welkom_message.' '.$_POST["naam"]; ?></h2>    
    <?php else: ?>
    <h2>Inloggen</h2>
    <?php if(isset($message)): ?>
    <p><?php echo $message ?></p>
    <?php endif ?>
    <form method="post">
      <label>Uw naam: </label><input type="text" name="naam" id="naam">
      <label>Uw wachtwoord: </label><input type="password" name="w8woord" id="w8woord">
      <input type="submit" value="In loggen" name="submit">
    </form>
    <?php endif ?>
  </body>
</html>