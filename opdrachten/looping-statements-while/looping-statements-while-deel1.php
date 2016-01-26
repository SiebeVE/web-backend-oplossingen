<?php
/*Deel 1*/

$getallen = array();

$tellen_tot = 100;
$teller = 0;
$teller_tekst = '';

while($teller <= $tellen_tot)
{
  $getallen[] = $teller;
  $teller_tekst .= $teller.", ";
  
  $teller++;
}

$teller_tekst = rtrim($teller_tekst, ", ");

/*Deel 2*/

$teller = 0;
$teller_tekst2 = '';

while($teller <= $tellen_tot)
{
  $cur_getal = $getallen[$teller];
  if ($cur_getal%3==0 && $cur_getal > 40 && $cur_getal < 80)
  {
    $teller_tekst2 .= $cur_getal.", ";
  }
  $teller++;
}

$teller_tekst2 = rtrim($teller_tekst2, ", ");

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Oplossing looping statements while - Deel 1</title>
  </head>
  <body>
    <h1>Oplossing looping statements while - Deel 1</h1>
    <p><?php echo $teller_tekst; ?></p>
    <p><?php echo $teller_tekst2; ?></p>
  </body>
</html>