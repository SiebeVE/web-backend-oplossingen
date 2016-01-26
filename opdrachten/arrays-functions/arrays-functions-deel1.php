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

$aantal_dieren = count($dieren);

$teZoekenDier = 'paard';

$index_needle = array_search($teZoekenDier, $dieren);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Oplossingen arrays function- Deel 1</title>
</head>
<body>
  <h1>Oplossingen arrays function- Deel 1</h1>
  <p><?php var_dump($dieren)?></p>
  <p>Aantal dieren: <?= $aantal_dieren ?></p>
  <p>
  <?php var_dump($index_needle)?>
  <?php if($index_needle !== FALSE): ?>
    Het dier <?=$teZoekenDier?> is gevonden in de array!
  <?php else: ?>
    Het dier <?=$teZoekenDier?> is NIET gevonden in de array!
  <?php endif ?>
  </p>
</body>
</html>