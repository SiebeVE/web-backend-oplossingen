<?php
$username = 'backend';
$password = 'backend';
$database = 'bieren';

$error_connect = false;
$brouwerNr = null;

try
{
  $con = new PDO("mysql:host=localhost;dbname=$database;charset=utf8", $username, $password);

  $brouwersPDO = $con->prepare("SELECT brouwernr, brnaam FROM brouwers");
  $brouwersPDO->execute();
  $brouwers = $brouwersPDO->fetchAll(PDO::FETCH_ASSOC);

  
  if(isset($_GET['brouwer']) && $_GET['brouwer'] != "geen")
  {
    //ophalen van bieren van specifieke brouwer
    $bierenPDO = $con->prepare("SELECT naam FROM bieren WHERE brouwernr = :brouwernr");
    $brouwerNr = $_GET['brouwer'];
    $bierenPDO->bindParam(':brouwernr',$brouwerNr);
    $bierenPDO->execute();
    $bieren = $bierenPDO->fetchAll(PDO::FETCH_ASSOC);
  }
  else
  {
    $bierenPDO = $con->prepare("SELECT naam FROM bieren");
    $bierenPDO->bindParam(':brouwernr',$brouwerNr);
    $bierenPDO->execute();
    $bieren = $bierenPDO->fetchAll(PDO::FETCH_ASSOC);
  }
}
catch(PDOException $e)
{
  $error_message = $e->getMessage();

  $error_connect = true;
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Oplossing CRUD query - deel 2</title>
    <style>
      .even
      {
        background-color: #b4b4b4;
      }
    </style>
  </head>
  <body>
    <h1>Oplossing CRUD query - deel 2</h1>
    <?php if ($error_connect): ?>
      <p>Connectie naar MySQL server is mislukt</p>
      <p><?=$error_message ?></p>
    <?php else: ?>
      <form action="CRUD-query-deel2.php" method="get">
        <select name="brouwer">
          <option value="geen" <?= ($brouwerNr == "geen")? "selected" : ""?>>Toon alles</option>
          <?php foreach($brouwers as $brouwer): ?>
          <option value="<?= $brouwer['brouwernr'] ?>" <?= ($brouwer['brouwernr'] == $brouwerNr)? "selected" : ""?>><?= $brouwer['brnaam'] ?></option>
          <?php endforeach ?>
        </select>
        <input type="submit" value="Bieren opvragen">
      </form>
    <table>
      <tr>
        <th>Aantal</th>
        <th>Naam</th>
      </tr>
      <?php foreach($bieren as $key => $bier): ?>
      <tr class=<?= (($key+1)%2 == 0)? 'even' : '' ?>>
        <td><?= $key+1 ?></td>
        <?php foreach($bier as $value): ?>
        <td><?= $value ?></td>
        <?php endforeach ?>
      </tr>
      <?php endforeach ?>
    </table>
    <?php endif ?>
  </body>
</html>