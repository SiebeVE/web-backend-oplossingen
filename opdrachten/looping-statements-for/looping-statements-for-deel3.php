<?php
$rijen = 10;
$kolommen = 10;
$oneven_class = " class='oneven'";

$getallen = array();

for($kol_count = 0; $kol_count <= $kolommen; $kol_count++)
{
  $getallen_rij = array();
  for ($rij_count = 0; $rij_count <= $rijen; $rij_count++)
  {
    $getallen_rij[] = $kol_count*$rij_count;
  }
  $getallen[] = $getallen_rij;
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Oplossing looping statements for - Deel 3</title>
    <style>
      table,
      td
      {
        border: 1px solid black;
        border-collapse: collapse;
      }
      td
      {
        padding: 5px;
      }
      .oneven
      {
        background-color: green;
      }
    </style>
  </head>
  <body>
    <h1>Oplossing looping statements for - Deel 3</h1>
    <table>
    <?php foreach($getallen as $rij_getallen): ?>
    <tr>
      <?php foreach($rij_getallen as $getal): ?>
      <td <?php if($getal%2 != 0): echo $oneven_class; endif ?>><?php echo $getal ?></td>
      <?php endforeach ?>
    </tr>
    <?php endforeach ?>
    </table>
  </body>
</html>