<?php
$getal = 10;

if ($getal > 0 && $getal < 11)
{
  $min = 0;
  $max = 11;
}
else if ($getal > 10 && $getal < 21)
{
  $min = 10;
  $max = 21;
}
else if ($getal > 20 && $getal < 31)
{
  $min = 20;
  $max = 31;
}
else if ($getal > 30 && $getal < 41)
{
  $min = 30;
  $max = 41;
}
else if ($getal > 40 && $getal < 51)
{
  $min = 40;
  $max = 51;
}
else if ($getal > 50 && $getal < 61)
{
  $min = 50;
  $max = 61;
}
else if ($getal > 60 && $getal < 71)
{
  $min = 60;
  $max = 71;
}
else if ($getal > 70 && $getal < 81)
{
  $min = 70;
  $max = 81;
}
else if ($getal > 80 && $getal < 91)
{
  $min = 80;
  $max = 91;
}
else if ($getal > 90 && $getal < 101)
{
  $min = 90;
  $max = 101;
}
$tekst = strrev("Het getal ligt tussen ".$min." en ".$max);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Oplossing conditional statements if elseif</title>
</head>
<body>
  <h1>Oplossing conditional statements if elseif</h1>
  <p><?php echo $tekst ?></p>
</body>
</html>