<?php
$boodschappenlijstje = array('Eieren','Bloem','Melk', 'Boter');

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Oplossing looping statements while - Deel 2</title>
  </head>
  <body>
    <h1>Oplossing looping statements while - Deel 2</h1>
    <?php $teller = 0; ?>
    <ul>
    <?php while (isset($boodschappenlijstje[$teller])): ?>
    <li><?php echo $boodschappenlijstje[$teller] ?></li>
    <?php $teller++; ?>
    <?php endwhile ?>
    </ul>
  </body>
</html>