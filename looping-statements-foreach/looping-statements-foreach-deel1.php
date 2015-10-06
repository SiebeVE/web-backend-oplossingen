<?php
$text = file_get_contents("text-file.txt");

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
    $characters[$char] = 1;
    $prev_char = $char;
  }
}
$aantal_char = count($characters);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Oplossing looping statements foreach - Deel 1</title>
  </head>
  <body>
    <h1>Oplossing looping statements foreach - Deel 1</h1>
    <p>In totaal zijn er <?php echo $aantal_char ?> verschillende tekens.</p>
    <p><?php var_dump($characters) ?></p>
  </body>
</html>