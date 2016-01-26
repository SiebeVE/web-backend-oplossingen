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

$error_connect = false;

try
{
  $con = new PDO("mysql:host=localhost;dbname=$database;charset=utf8", $username, $password);
  
  $bierenPDO = $con->prepare(
    "SELECT * FROM bieren AS b
  JOIN brouwers AS br
  ON (br.brouwernr = b.brouwernr)
  WHERE b.naam LIKE 'du%' AND br.brnaam LIKE '%a%'");
  $bierenPDO->execute();
  $bieren = $bierenPDO->fetchAll(PDO::FETCH_ASSOC);
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
    <title>Oplossing CRUD query - deel 1</title>
    <style>
      .even
      {
        background-color: #b4b4b4;
      }
    </style>
  </head>
  <body>
    <h1>Oplossing CRUD query - deel 1</h1>
    <?php if ($error_connect): ?>
      <p>Connectie naar MySQL server is mislukt</p>
      <p><?=$error_message ?></p>
    <?php else: ?>
    <table>
      <tr>
        <th>Biernummer</th>
        <?php foreach($bieren[0] as $key => $bier): ?>
          <th><?= $key ?></th>
        <?php endforeach ?>
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