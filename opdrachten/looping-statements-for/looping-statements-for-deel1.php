<?php
$rijen = 10;
$kolommen = 10;
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Oplossing looping statements for - Deel 1</title>
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
    </style>
  </head>
  <body>
    <h1>Oplossing looping statements for - Deel 1</h1>
    <table>
      <?php for($kol_count = 0; $kol_count <= $kolommen; $kol_count++): ?>
      <tr>
        <?php for ($rij_count = 0; $rij_count <= $rijen; $rij_count++): ?>
        <td>Kolom</td>
        <?php endfor ?>
      </tr>
      <?php endfor ?>
    </table>
  </body>
</html>