<?php
//Opdracht 2
$lettertje = "e";
$cijfertjes = 3;
$langsteWoord = "zandzeepsodemineralenwatersteenstralen";

$langsteWoordReplace = str_replace($lettertje, $cijfertjes, $langsteWoord);

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Oplossing string extra functions - Deel 3</title>
  </head>
  <body>
    <h1>Oplossing string extra functions - Deel 3</h1>
    <p>Vervang: <?php echo $langsteWoordReplace ?></p>
  </body>
</html>