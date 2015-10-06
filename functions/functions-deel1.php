<?php
function berekenSom($getal1, $getal2)
{
  return $getal1+$getal2;
}
function vermenigvuldig($getal1, $getal2)
{
  return $getal1*$getal2;
}
function isEven($getal)
{
  if ($getal%2 == 0){ return true; }
  return false;
}
function uppercaseAndLength($string)
{
  return array(strtoupper($string),strlen($string));
}
$getal1 = 51;
$getal2 = 12;
$string = "Dit is een zeer mooie string!";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Oplossing functions - Deel 1</title>
  </head>
  <body>
    <h1>Oplossing functions - Deel 1</h1>
    <p>Getal 1: <?php echo $getal1; ?></p>
    <p>Getal 2: <?php echo $getal2; ?></p>
    <p>String: <?php echo $string ?></p>
    <p>Som: <?php echo berekenSom($getal1, $getal2); ?></p>
    <p>Vermenigvuldiging: <?php echo vermenigvuldig($getal1, $getal2); ?></p>
    <p>Getal 1 is even? <?php if(isEven($getal1)): echo 'Even'; else: echo 'Oneven'; endif ?></p>
    <p>Getal 2 is even? <?php if(isEven($getal2)): echo 'Even'; else: echo 'Oneven'; endif ?></p>
    <ul>
      <?php foreach(uppercaseAndLength($string) as $val): ?>
      <li><?php echo $val ?></li>
      <?php endforeach ?>
    </ul>
  </body>
</html>