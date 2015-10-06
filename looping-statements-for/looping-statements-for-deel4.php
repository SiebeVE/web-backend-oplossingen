<?php
$rijen = 11;
$kolommen = 11;
$oneven_class = " class='oneven'";

$getallen = array();

for($kol_count = 0; $kol_count <= $kolommen; $kol_count++)
{
  $getallen_rij = array();
  for ($rij_count = 0; $rij_count < $rijen; $rij_count++)
  {
    if ($rij_count == 0)
    {
      if ($kol_count == 0)
      {
        $getallen_rij[] = "Tafel";
      }
      else
      {
        $getallen_rij[] = $kol_count-1;
      }
    }
    if ($kol_count == 0)
    {
      $getallen_rij[] = -($kol_count-1)*($rij_count);
    }
    else
    {
      $getallen_rij[] = ($kol_count-1)*($rij_count);
    }
  }
  $getallen[] = $getallen_rij;
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Oplossing looping statements for - Deel 4</title>
    <style>
      table,
      td,
      th
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
    <h1>Oplossing looping statements for - Deel 4</h1>
    <table>
      <thead>
        <?php foreach ($getallen as $rij => $rij_getallen): ?>
        <th><?php echo $rij_getallen[0] ?></th>
        <?php endforeach ?>
      </thead>
      <tbody>
        <?php foreach($getallen as $rij => $rij_getallen): ?>
        <?php if ($rij != 0): ?>
        <tr>
          <?php foreach($rij_getallen as $kolom => $getal): ?>
          <td <?php if($getal%2 != 0 && $kolom != 0): echo $oneven_class; endif ?>><?php echo $getal ?></td>
          <?php endforeach ?>
        </tr>
        <?php endif ?>
      <?php endforeach ?>
      </tbody>
    </table>
  </body>
</html>