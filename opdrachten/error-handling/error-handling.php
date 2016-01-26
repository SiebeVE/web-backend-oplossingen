<?php
session_start();

$isValid = false;

try
{
  if(isset($_POST['submit']))
  {
    if (!isset($_POST['code']))
    {
      throw new Exception('SUBMIT-ERROR');
    }
    else if(strlen($_POST['code']) != 8)
    {
      throw new Exception('VALIDATION-CODE-LENGTH');
    }
    else
    {
      $isValid = true;
    }
  }
}
catch(Exception $e)
{
  $messageCode = $e->getMessage();
  $message = array();
  $createMessage = false;
  
  switch ($messageCode)
  {
    case('SUBMIT-ERROR'):
      $message['type'] = 'error';
      $message['text'] = 'Er werd met het formulier geknoeid';
      break;
    case('VALIDATION-CODE-LENGTH'):
      $message['type'] = 'error';
      $message['text'] = 'De kortingscode heeft niet de juiste lengte';
      $createMessage = true;
      break;
  }
  if ($createMessage)
  {
    createMessage($message);
  }
  logToFile($message);
}

$wrongCodeMessage = showMessage();

function logToFile($message)
{
  $tijd = date("H:i:s Y-m-d");
  $ipAdres = $_SERVER['REMOTE_ADDR'];
  
  $error_message = "[".$tijd."] - ".$ipAdres." - type:[".$message['type']."] ".$message['text']."\r";
  
  file_put_contents('error.txt', $error_message, FILE_APPEND);
}

function createMessage($message)
{
  $_SESSION['message'] = $message;
}

function showMessage()
{
  if (isset($_SESSION['message']))
  {
    $message = $_SESSION['message'];
    unset($_SESSION['message']);
    return $message['text'];
  }
  else
  {
    return false;
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Oplossing error handling</title>
  <style>
    input[type='submit']
    {
      display: block;
    }
  </style>
</head>
<body>
  <h1>Oplossing error handling</h1>
  <h2>Geef uw kortingscode op</h2>
  <?php if ($isValid): ?>
  <p>Kortingscode toegekend!</p>
  <?php else: ?>
  <?= ($wrongCodeMessage)? $wrongCodeMessage : '';?>
  <form action="error-handling.php" method="post">
    <label>Kortingscode: </label><input type="text" name="code">
    <input type="submit" name="submit" value="Valideren">
  </form>
  <?php endif ?>
</body>
</html>