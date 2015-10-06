<?php
$pigHealth = 5;
$maximumThrows = 8;

function calculateHit()
{
  global $pigHealth;
  
  if (rand(1,6) < 2.5)
  {
    //raak
    $pigHealth--;
    $gramTekst = "varkens";
    if ($pigHealth == 1)
    {
      $gramTekst = "varken";
    }
    $tekst = "Raak! Er zijn nog maar ".$pigHealth." ".$gramTekst." over.";
  }
  else
  {
    $gramTekst = "varkens";
    if ($pigHealth == 1)
    {
      $gramTekst = "varken";
    }
    $tekst = "Mis! Er zijn nog ".$pigHealth." ".$gramTekst." over.";
  }
  return $tekst;
}

function launchAngryBird()
{
  global $maximumThrows;
  global $pigHealth;
  
  static $throws = 0;
  static $tekst = array();
  
  $throws++;
  
  if ($throws <= $maximumThrows)
  {
    $tekst[] = calculateHit();
    if ($pigHealth != 0)
    {
      launchAngryBird();
    }
    else
    {
      if ($pigHealth > 0)
      {
        //verloren
        $tekst[] = "Verloren!";
      }
      else
      {
        //gewonnen
        $tekst[] = "Gewonnen!";
      }
    }
  }
  else if ($pigHealth > 0)
  {
    //verloren
    $tekst[] = "Verloren!";
  }
  else
  {
    //gewonnen
    $tekst[] = "Gewonnen!";
  }
  return $tekst;
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Oplossing functions gevorderd- Deel 2</title>
  </head>
  <body>
    <h1>Oplossing functions gevorderd- Deel 2</h1>
    <?php foreach(launchAngryBird() as $val): ?>
    <p><?php echo $val ?></p>
    <?php endforeach ?>
  </body>
</html>