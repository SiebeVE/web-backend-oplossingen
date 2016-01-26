<?php
$startgeld = 100000;
$rente_percentage = 0.08;
$jaar = 10;

function berekenRente($geld, $rente_percentage, $jaar, $rente_tekst = array())
{
  if ($jaar != 0)
  {
    $rente = floor($geld*$rente_percentage);
    $geld += $rente;
    $jaar--;
    $rente_tekst[] = array("geld"=>$geld, "rente" => $rente);
    return berekenRente($geld, $rente_percentage, $jaar, $rente_tekst);
  }
  else
  {
    return $rente_tekst;
  }
}
$kapitaal = berekenRente($startgeld, $rente_percentage, $jaar);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Oplossing functions recursive- Deel 1</title>
  </head>
  <body>
    <h1>Oplossing functions recursive- Deel 1</h1>
    <ul>
      <?php foreach($kapitaal as $val): ?>
      <li>Het nieuwe bedrag bedraagt <?php echo $val["geld"] ?>&euro; (waarvan <?php echo $val["rente"]?>&euro; onze rente is)</li>
      <?php endforeach ?>
    </ul>
  </body>
</html>