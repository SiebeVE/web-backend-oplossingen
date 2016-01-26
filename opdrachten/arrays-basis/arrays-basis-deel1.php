<?php
$dieren1 = array(
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

$dieren[] = 'paard';
$dieren[] = 'konijn';
$dieren[] = 'hond';
$dieren[] = 'papegaai';
$dieren[] = 'kat';
$dieren[] = 'aap';
$dieren[] = 'olifant';
$dieren[] = 'giraf';
$dieren[] = 'neushoorn';
$dieren[] = 'gier';

$voertuigen = array(
  'landvoertuig' => array(
    'Vespa',
    'fiets'),
  'watervoertuigen' => array(
    'surfplank',
    'vlot',
    'schoener',
    'driemaster'),
  'luchtvoertuigen' => array(
    'luchtballon',
    'helikopter',
    'B52'));
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Oplossing arrays basis - Deel 1</title>
</head>
<body>
  <h1>Oplossing arrays basis - Deel 1</h1>
  <pre><?php var_dump($dieren)?></pre>
  <pre><?php var_dump($voertuigen)?></pre>
</body>
</html>