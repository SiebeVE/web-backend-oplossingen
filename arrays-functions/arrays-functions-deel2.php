<?php
$dieren = array(
  'paard',
  'konijn',
  'hond',
  'papegaai',
  'kat',
  'aap',
  'olifant',
  'giraf',
  'neushoorn',
  'gier');

sort($dieren);

$zoogdieren = array('dolfijn','bonobo','chimpansee');
$dierenLijst = array_merge($dieren, $zoogdieren);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Oplossingen arrays function- Deel 2</title>
  </head>
  <body>
    <h1>Oplossingen arrays function- Deel 2</h1>
    <p><?php var_dump($dieren)?></p>
    <p>
      <?php var_dump($dierenLijst)?>
    </p>
  </body>
</html>