<?php
$seconden = 221108521;

$minuten = round($seconden/60);
$uren = round($minuten/60);
$dagen = round($uren/24);
$weken = round($dagen/7);
$maanden = round($dagen/31);
$jaren = round($maanden/12);

//afronden
$minuten = floor($minuten);
$uren = floor($uren);
$dagen = floor($dagen);
$weken = floor($weken);
$maanden = floor($maanden);
$jaren = floor($jaren);

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Oplossing conditional statements if else - Deel 2</title>
  </head>
  <body>
    <h1>Oplossing conditional statements if else - Deel 2</h1>
    <p><?php echo $seconden ?> seconden is gelijk aan:</p>
    <ul>
      <li>minuten: <?php echo $minuten ?></li>
      <li>uren: <?php echo $uren ?></li>
      <li>dagen: <?php echo $dagen ?></li>
      <li>weken: <?php echo $weken ?></li>
      <li>maanden (31): <?php echo $maanden ?></li>
      <li>jaren (365): <?php echo $jaren ?></li>
    </ul>
  </body>
</html>