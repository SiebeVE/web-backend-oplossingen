<?php
$username = 'backend';
$password = 'backend';
$database = 'bieren';

function dump_var($var)
{
  echo '<pre>';
  var_dump($var);
  echo '</pre>';
}

$error = false;
$succes = false;

try
{
  $con = new PDO("mysql:host=localhost;dbname=$database;charset=utf8", $username, $password);
  
  if(isset($_POST['submit']))
  {
    $insertQuery = "INSERT INTO brouwers (brnaam, adres, postcode, gemeente, omzet) VALUES (:brnaam, :adres, :postcode, :gemeente, :omzet)";

    $insertPDO = $con->prepare($insertQuery);

    $insertPDO->bindParam(':brnaam',$_POST['brnaam']);
    $insertPDO->bindParam(':adres',$_POST['adres']);
    $insertPDO->bindParam(':postcode',$_POST['postcode']);
    $insertPDO->bindParam(':gemeente',$_POST['gemeente']);
    $insertPDO->bindParam(':omzet',$_POST['omzet']);

    if($insertPDO->execute())
    {
      $succes = true;

      $idNewBrouwer = $con -> lastInsertId();
    }
    else
    {
      $error = true;

      $error_message["description"] = "Er ging iets mis met het toevoegen. Probeer opnieuw.";
      
      $errorArray = $insertPDO->errorInfo();
      
      $error_message["error"] = "Error [".$errorArray[0]."]: ".$errorArray[2];
    }
  }
}
catch(PDOException $e)
{
  $error = true;
  
  $error_message["description"] = "Connectie naar MySQL server is mislukt.";
  $error_message["error"] = $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Oplossing CRUD insert</title>
    <style>
      input
      {
        display: block;
      }
    </style>
  </head>
  <body>
    <h1>Oplossing CRUD insert</h1>
    <?php if ($error): ?>
    <p><?=$error_message["description"]?></p>
    <p><?= $error_message["error"] ?></p>
    <?php elseif($succes): ?>
    <p>Brouwerij succesvol toegevoegd. Het unieke nummer van deze brouwerij is <?= $idNewBrouwer ?>.</p>
    <?php endif ?>
    <h2>Voeg een brouwer toe</h2>
    <form action="CRUD-insert.php" method="post">
      <label for="brnaam">Brouwernaam</label>
      <input type="text" id="brnaam" name="brnaam">
      <label for="adres">Adres</label>
      <input type="text" id="adres" name="adres">
      <label for="postcode">Postcode</label>
      <input type="number" id="postcode" name="postcode" min="1000" max="9999">
      <label for="gemeente">Gemeente</label>
      <input type="text" id="gemeente" name="gemeente">
      <label for="omzet">Omzet</label>
      <input type="number" id="omzet" name="omzet">
      <input type="submit" name="submit" value="Verzenden">
    </form>
  </body>
</html>