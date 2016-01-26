<?php
$getallen = array ('1','2','3','4','5');

$vermenigvuldiging = 1;
for($i=0; $i<count($getallen); $i++)
{
  $vermenigvuldiging *= $getallen[$i];
  if ($getallen[$i]%2 == 1)
  {
    $oneven[] = $getallen[$i];
  }
}

$getallen_reverse = array_reverse($getallen);

for($i=0; $i<count($getallen); $i++)
{
  $som[] = $getallen[$i] + $getallen_reverse[$i];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Oplossing arrays basis - Deel 2</title>
</head>
<body>
  <h1>Oplossing arrays basis - Deel 2</h1>
  <p>Vermenigvuldigd: <?php echo $vermenigvuldiging ?></p>
  <p>Oneven:</p>
  <ul>
    <?php foreach($oneven as $val): ?>
    <li><?php echo $val ?></li>
    <?php endforeach ?>
  </ul>
  <p>Sommen:</p>
  <ul>
    <?php foreach($som as $val): ?>
    <li><?php echo $val ?></li>
    <?php endforeach ?>
  </ul>
</body>
</html>