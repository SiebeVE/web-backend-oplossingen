<?php
$testArray = array('test1',array('test11',array('test111','test112'),'test13'), 'test3');
$html_to_check = "<html> tesst </html>";
function print_var_name($var)
{
  foreach($GLOBALS as $var_name => $value)
  {
    if ($value === $var)
    {
      return $var_name;
    }
  }
  return false;
}
function makeKey($isArray, $key)
{
  if (strpos($isArray, '[') !== false)
  {
    $key = $isArray."[".$key."]";
  }
  else
  {
    $key = "[".$isArray."]"."[".$key."]";
  }
  return $key;
}
function drukArrayAf($array, $var_name = true, $isArray = false)
{
  if ($var_name === true)
  {
    $var_name = print_var_name($array);
  }
  
  $cur_array = array();
  
  foreach($array as $key => $value)
  {
    if (is_array($value))
    {
      if ($isArray)
      {
        $key = makeKey($isArray, $key);
      }
      $cur_array = array_merge($cur_array,drukArrayAf($value, $var_name, $key));
    }
    else
    {
      if ($isArray)
      {
        $key = makeKey($isArray, $key);
      }
      else
      {
        $key = "[".$key."]";
      }
      $cur_array[] = array("var_naam" => $var_name, "key" => $key, "val" => $value);
    }
  }
  return $cur_array;
}
function validateHtmlTag($html)
{
  $openTag = "<html>";
  $closeTag = substr_replace($openTag, "/", 1, 0);
  
  $valid = false;
  if (strpos($html, $openTag) === 0)
  {
    $pos_close_tag = strlen($html) - strlen($closeTag);
    if (strpos($html, $closeTag) === $pos_close_tag)
    {
      $valid = true;
    }
  }
  return $valid;
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Oplossing functions - Deel 2</title>
  </head>
  <body>
    <h1>Oplossing functions - Deel 2</h1>
    <?php foreach(drukArrayAf($testArray) as $value): ?>
    <p><?php echo $value["var_naam"].$value["key"] ?> heeft waarde '<?php echo $value["val"]; ?>'</p>
    <?php endforeach ?>
    <?php if(validateHtmlTag($html_to_check)): ?>
    <p>Hoera de HTML is valid!</p>
    <?php else: ?>
    <p>Mmh, die HTML lijkt niet te kloppen</p>
    <?php endif ?>
  </body>
</html>