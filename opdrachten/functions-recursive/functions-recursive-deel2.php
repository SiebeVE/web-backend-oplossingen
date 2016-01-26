<?php
$startgeld = 100000;
$rente_percentage = 0.08;
$jaar = 10;

function berekenRente($data)
{
  if ($data["jaar"] != 0)
  {
    $rente = floor($data["geld"]*$data["rente"]);
    $data["geld"] += $rente;
    $data["jaar"]--;
    if (!array_key_exists("rente_tekst", $data))
    {
      $data["rente_tekst"] = array();
    }
    $data["rente_tekst"][] = array("geld"=>$data["geld"], "rente" => $rente);
    return berekenRente($data);
  }
  else
  {
    return $data["rente_tekst"];
  }
}

$gegevensHans = array("geld" => $startgeld, "rente" => $rente_percentage, "jaar" => $jaar);

$kapitaal = berekenRente($gegevensHans);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Oplossing functions recursive- Deel 2</title>
  </head>
  <body>
    <h1>Oplossing functions recursive- Deel 2</h1>
    <ul>
      <?php foreach($kapitaal as $val): ?>
      <li>Het nieuwe bedrag bedraagt <?php echo $val["geld"] ?>&euro; (waarvan <?php echo $val["rente"]?>&euro; onze rente is)</li>
      <?php endforeach ?>
    </ul>
  </body>
</html>