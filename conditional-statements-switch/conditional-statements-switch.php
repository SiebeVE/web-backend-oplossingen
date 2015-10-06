<?php
$getal = 8;

switch($getal)
{
  case 1:
    $tekst = 'maandag';
    break;
  case 2:
    $tekst = 'dinsdag';
    break;
  case 3:
    $tekst = 'woensdag';
    break;
  case 4:
    $tekst = 'donderdag';
    break;
  case 5:
    $tekst = 'vrijdag';
    break;
  case 6:
    $tekst = 'zaterdag';
    break;
  case 7:
    $tekst = 'zondag';
    break;
  default:
    $tekst = 'onbekend';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Oplossing conditional statements switch</title>
</head>
<body>
  <h1>Oplossing conditional statements switch</h1>
  <p>Dag <?php echo $getal ?> is <?php echo $tekst ?></p>
</body>
</html>