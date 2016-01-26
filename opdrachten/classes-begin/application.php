<?php
function __autoload ($klasse)
{
  include 'classes/'.$klasse.'.php';
}

$new = 150;
$unit = 100;

$percent = new Percent($new, $unit);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Oplossing classes begin</title>
  </head>
  <body>
    <h1>Oplossing classes begin</h1>
    <p>Hoeveel procent is <?= $new ?> van <?= $unit ?>?</p>
    <table>
      <tr>
        <td>Absoluut</td>
        <td><?= $percent->absolute ?></td>
      </tr>
      <tr>
        <td>Relatief</td>
        <td><?= $percent->relative ?></td>
      </tr>
      <tr>
        <td>Geheel getal</td>
        <td><?= $percent->hunderd ?>%</td>
      </tr>
      <tr>
        <td>Nominaal</td>
        <td><?= $percent->nominal ?></td>
      </tr>
    </table>
</body>
</html>