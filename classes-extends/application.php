<?php
function __autoload ($klasse)
{
  include 'classes/'.$klasse.'.php';
}

$dieren[] = new Animal('Dier 1', 'male', 100);
$dieren[] = new Animal('Dier 2', 'female', 200);
$dieren[] = new Animal('Dier 3', 'male', 100);
$dieren[] = new Lion('Leeuw 1', 'male', 100, 'Afrikaanse');
$dieren[] = new Lion('Leeuw 2', 'male', 100, 'Keniaanse');
$dieren[] = new Zebra('Zebra 1', 'male', 100, 'Quagga');
$dieren[] = new Zebra('Zebra 2', 'male', 100, 'Selous');

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Oplossing classes extends</title>
  </head>
  <body>
    <h1>Oplossing classes extends</h1>
    <?php foreach($dieren as $dier): ?>
    <p>
    <?=$dier->getName()?> is van het 
    geslacht <?=$dier->getGender()?> en heeft momenteel 
    <?=$dier->getHealth()?> 
    (special move: <?=$dier->doSpecialMove()?>).
    
    <?php if(get_class($dier)=='Lion'): ?>
    Deze leeuw is van de soort <?=$dier->getSpecies()?>.
    <?php elseif(get_class($dier)=='Zebra'): ?>
    Deze zebra is van de soort <?=$dier->getSpecies()?>.
    <?php endif ?>
    </p>
    <?php endforeach ?>
  </body>
</html>