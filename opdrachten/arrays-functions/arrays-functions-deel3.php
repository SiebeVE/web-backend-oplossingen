<?php
$getallen = array(8,7,8,7,3,2,1,2,4);

$getallen_uni = array_unique($getallen);

sort($getallen_uni);
  $getallen_uni = array_reverse($getallen_uni);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Oplossingen arrays function- Deel 3</title>
  </head>
  <body>
    <h1>Oplossingen arrays function- Deel 3</h1>
    <p><?php var_dump($getallen_uni) ?></p>
  </body>
</html>