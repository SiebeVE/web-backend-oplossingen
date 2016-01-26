<?php
$jaar = 2004;

if ($jaar%4 == 0 && ($jaar%100 != 0 || $jaar%400 ==0))
{
  //schrikkeljaar
  $resultaat = "een";
}
else
{
  //geen schrikkeljaar
  $resultaat = "geen";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Oplossing conditional statements if else - Deel 1</title>
</head>
<body>
  <h1>Oplossing conditional statements if else - Deel 1</h1>
  <p>Het jaar <?php echo $jaar ?> is <?php echo $resultaat ?> schrikkeljaar.</p>
</body>
</html>