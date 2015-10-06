<?php
$getal = 7;
$dag = "onbekend";

if ($getal == 1)
{
  $dag = "maandag";
}
if ($getal == 2)
{
  $dag = "dinsdag";
}
if ($getal == 3)
{
  $dag = "woensdag";
}
if ($getal == 4)
{
  $dag = "donderdag";
}
if ($getal == 5)
{
  $dag = "vrijdag";
}
if ($getal == 6)
{
  $dag = "zaterdag";
}
if ($getal == 7)
{
  $dag = "zondag";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Oplossing conditional statements - Deel 1</title>
</head>
<body>
  <h1>Oplossing conditional statements - Deel 1</h1>
  <p>Dag <?php echo $getal ?>: <?php echo $dag ?></p>
</body>
</html>