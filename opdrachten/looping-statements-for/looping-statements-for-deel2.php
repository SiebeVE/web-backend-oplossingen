<?php
$rijen = 10;
$kolommen = 10;
$oneven_class = " class='oneven'";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Oplossing looping statements for - Deel 2</title>
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
    <h1>Oplossing looping statements for - Deel 2</h1>
    <table>
      <?php for($kol_count = 0; $kol_count <= $kolommen; $kol_count++): ?>
      <tr>
        <?php for ($rij_count = 0; $rij_count <= $rijen; $rij_count++): ?>
        <?php $cur_getal = $kol_count*$rij_count; ?>
        <td<?php if($cur_getal%2 != 0): echo $oneven_class; endif ?>><?php echo $cur_getal ?></td>
        <?php endfor ?>
      </tr>
      <?php endfor ?>
    </table>
  </body>
</html>