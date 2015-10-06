<?php
//Opdracht 2
$fruit = "ananas";

$needle = "a";
$posLast_needle_fruit = strrpos($fruit, $needle);

$fruit_cap = strtoupper($fruit);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Oplossing string extra functions - Deel 2</title>
  </head>
  <body>
    <h1>Oplossing string extra functions - Deel 2</h1>
    <p>Positie laatste <?php echo $needle ?>: <?php echo $posLast_needle_fruit ?></p>
    <p>Hoofdletters: <?php echo $fruit_cap ?></p>
  </body>
</html>