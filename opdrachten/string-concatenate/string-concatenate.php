<?php
  $voornaam = "Siebe";
  $achternaam = "Vanden Eynden";

  $volledigeNaam = $voornaam." ".$achternaam;

  $len_volledigeNaam = strlen($volledigeNaam);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Oplossing string concatenate</title>
</head>
<body>
  <h1>Oplossing string concatenate</h1>
  <p><?php echo $volledigeNaam; ?></p>
  <p>Aantal karakters: <?php echo $len_volledigeNaam; ?></p>
</body>
</html>