<?php
$text = file_get_contents("text-file.txt");
$text = strtoupper($text);

$textChars = str_split($text);
rsort($textChars);
$textChars = array_reverse($textChars);

$characters = array();

$prev_char = 'leeg';
foreach($textChars as $char)
{
  //checken of nieuw karakter
  if ($char == $prev_char)
  {
    $characters[$char]++;
  }
  else
  {
    //nieuw -> nieuwe in array $characters
    //checken of karakter letter is
    if(ctype_alpha($char))
    {
      $characters[$char] = 1;
      $prev_char = $char;
    }
  }
}
$aantal_char = count($characters);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Oplossing looping statements foreach - Deel 2</title>
  </head>
  <body>
    <h1>Oplossing looping statements foreach - Deel 2</h1>
    <ul>
      <?php foreach($characters as $letter => $aantal): ?>
      <li><?php echo $letter; ?> x <?php echo $aantal ?></li>
      <?php endforeach ?>
    </ul>
  </body>
</html>