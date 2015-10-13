<?php
$image_folder = "img/";
$page_title = "Oplossing get";
$individueel_artikel = false;
$artikel_id = "X";
$artikels = array(
  array(
    "titel"=>"Dit meisje niest 12.000 keer per dag",
    "datum"=>"7 oktober 2015",
    "inhoud"=>"Voor Katelyn Thornley (12) gaat er geen minuut voorbij zonder dat het meisje niest. Vaak tot twintig keer per minuut. Het probleem stak een goeie drie weken geleden de kop op en werd sindsdien alleen maar erger.",
    "afbeelding"=>$image_folder."artikel1.jpg",
    "afbeeldingBeschrijving"=>"Niezend meisje"
    ),
  array(
    "titel"=>"Peuter-dj steelt de show bij South Africa's Got Talent",
    "datum"=>"7 oktober 2015",
    "inhoud"=>"Een driejarige dj heeft zondag zijn skills bij South Africa's Got Talent getoond, en hoe!  Het kindje kreeg het publiek op de banken. De peuter-dj Arch Jr zorgde ervoor dat iedereen in de zaal los ging en hem aan het einde van zijn mix trakteerde op een staande ovatie. De jury was zelfs dusdanig onder de indruk dat ze hem een rechtstreeks ticket naar de halve finale cadeau deden.",
    "afbeelding"=>$image_folder."artikel2.jpg",
    "afbeeldingBeschrijving"=>"Peuter DJ"
  ),
  array(
    "titel"=>"Circuskunstjes in ruimtestation: niet gemakkelijk, wel heel grappig",
    "datum"=>"7 oktober 2015",
    "inhoud"=>"Het Russische ruimteagentschap Roskosmos verspreidt een video van astronauten die circuskunstjes uitvoeren in het Internationaal Ruimtestation ISS.",
    "afbeelding"=>$image_folder."artikel3.jpg",
    "afbeeldingBeschrijving"=>"Jonglerende kosmonaut in ruimtestation"
  )
  );

if (isset($_GET["id"]))
{
  $artikel_id = $_GET["id"];
  $individueel_artikel = true;
  if (array_key_exists($artikel_id, $artikels))
  {
    $artikel_bestaat = true;
    $page_title = $artikels[$artikel_id]["titel"];
  }
  else
  {
    $artikel_bestaat = false;
    $page_title = "Onbekend artikel";
  } 
}

function zoekWoord($haystack, $needle, $prev_key = false)
{
  $gevonden_array = array();
  
  foreach($haystack as $key => $value)
  {
    if (is_array($value))
    {
      $gevonden_array = array_merge($gevonden_array, zoekWoord($value, $needle, $key));
    }
    else if (strpos($value, $needle) !== false)
    {
      $gevonden_array[$prev_key][] = $prev_key;
    }
  }
  return $gevonden_array;
}
if (isset($_POST["submit"]))
{
  $zoek_array = zoekWoord($artikels, $_POST['keyword']);
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title><?php echo $page_title ?></title>
    <link rel="stylesheet" href="http://meyerweb.com/eric/tools/css/reset/reset.css">
    <style>
      .cf:before,
      .cf:after
      {
        content: "";
        display: table;
      }
      .cf:after{
        clear: both;
      }
      
      h1
      {
        font-size: 1.5em;
        font-weight: bold;
      }
      p
      {
        margin: 5px 0px;
      }
      article
      {
        width: 29%;
        float: left;
        margin: 10px 1%;
        background-color: #f0f0f0;
        padding: 1%;
      }
      article.enkel
      {
        width: 97%;
      }
      img
      {
        width: 100%;
      }
    </style>
  </head>
  <body>
    <h1>Oplossing get</h1>
    <?php if (!isset($_POST["keyword"])): ?>
      <div class="cf">
        <?php foreach($artikels as $nr => $artikel): ?>
          <?php if((isset($artikel_bestaat) && $nr == $artikel_id && $artikel_bestaat) || !$individueel_artikel): ?>
            <article <?php if ($individueel_artikel){ echo 'class="enkel"'; }?>>
              <h1><?php echo $artikel["titel"] ?></h1>
              <p><?php echo $artikel["datum"] ?></p>
              <img src="<?php echo $artikel["afbeelding"] ?>" alt="<?php echo $artikel["afbeeldingBeschrijving"] ?>">
              <p><?php echo substr($artikel["inhoud"], 0, 49); ?><?php if($individueel_artikel): ?><?php echo substr($artikel["inhoud"], 49) ?><?php else: ?>...<?php endif ?>
              </p>
              <?php if(!$individueel_artikel): ?>
                <a href="get.php?id=<?php echo $nr ?>">Lees meer</a>
              <?php endif ?>
            </article>
          <?php endif ?>
        <?php endforeach ?>
        <?php if(isset($artikel_bestaat) && !$artikel_bestaat): ?>
          <p>Dit artikel bestaat niet.</p>
        <?php endif ?>
      </div>
    <?php else: ?>
      <?php if (count($zoek_array) > 0): ?>
       <p>Het keywoard: "<?php echo $_POST['keyword'] ?>" is gevonden in volgende artikels:</p>
        <?php foreach($zoek_array as $key => $value): ?>
          <?php $key = $value[0]; ?>
          <article>
            <h1><?php echo $artikels[$key]["titel"] ?></h1>
            <p><?php echo $artikels[$key]["datum"] ?></p>
            <img src="<?php echo $artikels[$key]["afbeelding"] ?>" alt="<?php echo $artikels[$key]["afbeeldingBeschrijving"] ?>">
            <p><?php echo substr($artikels[$key]["inhoud"], 0, 49); ?><?php if($individueel_artikel): ?><?php echo substr($artikels[$key]["inhoud"], 49) ?><?php else: ?>...<?php endif ?>
            </p>
            <a href="get.php?id=<?php echo $key ?>">Lees meer</a>
          </article>
        <?php endforeach ?>
      <?php else: ?>
        <p>Het keyword: "<?php echo $_POST['keyword'] ?>" is niet gevonden in de artikels</p>
      <?php endif ?>
    <?php endif ?>
    <form method="post" action="get.php">
      <label for="keyword">Zoek naar: </label>
      <input type="text" name="keyword" id="keyword">
      <input type="submit" name="submit" value="Zoeken">
    </form>
  </body>
</html>