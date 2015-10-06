<?php
  //Opdracht 1
  $fruit = "kokosnoot";
  
  $len_fruit = strlen($fruit);
  
  $needle = "s";
  $pos_needle_fruit = strpos($fruit, $needle);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Oplossing string extra functions - Deel 1</title>
</head>
<body>
  <h1>Oplossing string extra functions - Deel 1</h1>
  <p>Karakters <?php echo $fruit ?>: <?php echo $len_fruit ?></p>
  <p>Positie eerste <?php echo $needle ?>: <?php echo $pos_needle_fruit ?></p>
</body>
</html>