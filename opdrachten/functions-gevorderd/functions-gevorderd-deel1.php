<?php
$md5HashKey = "d1fa402db91a7a93c4f414b8278ce073";
$needle1 = "2";
$needle2 = "8";
$needle3 = "a";
function percentageInHaystack1($needle)
{
  global $md5HashKey;
  
  return ((substr_count($md5HashKey, $needle)/strlen($md5HashKey))*100);
}
function percentageInHaystack2($needle)
{
  $md5HashKey = $GLOBALS["md5HashKey"];

  return ((substr_count($md5HashKey, $needle)/strlen($md5HashKey))*100);
}
function percentageInHaystack3($md5HashKey, $needle)
{
  return ((substr_count($md5HashKey, $needle)/strlen($md5HashKey))*100);
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Oplossing functions gevorderd- Deel 1</title>
  </head>
  <body>
    <h1>Oplossing functions gevorderd- Deel 1</h1>
    <p>Functie 1: de needle <?php echo $needle1 ?> komt <?php echo percentageInHaystack1($needle1) ?>% voor in de hash key '<?php echo $md5HashKey ?>'</p>
    <p>Functie 2: de needle <?php echo $needle2 ?> komt <?php echo percentageInHaystack2($needle2) ?>% voor in de hash key '<?php echo $md5HashKey ?>'</p>
    <p>Functie 3: de needle <?php echo $needle3 ?> komt <?php echo percentageInHaystack3($md5HashKey, $needle3) ?>% voor in de hash key '<?php echo $md5HashKey ?>'</p>
  </body>
</html>