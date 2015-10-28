<?php
class HTMLbuilder
{

  protected $header;
  protected $body;
  protected $footer;

  public function __construct($header, $body, $footer)
  {
    $this->header = $header;
    $this->body = $body;
    $this->footer = $footer;

    $this->buildPage();
  }

  public function buildPage()
  {
    $this->buildHeader();
    $this->buildBody();
    $this->buildFooter();
  }
  
  public function buildHeader()
  {
    $cssDir = dirname(dirname(__FILE__)) . '/css/';
    $cssLinks = $this->buildLinks($cssDir, 'css');
    include 'html/'. $this->header;
  }	

  public function buildBody()
  {
    include 'html/'. $this->body;
  }	

  public function buildFooter()
  {
    $jsDir = dirname(dirname(__FILE__)) . '/js/';
    $jsLinks = $this->buildLinks($jsDir, 'js');
    include 'html/'. $this->footer;
  }

  public function findFiles($dir, $type)
  {
    return glob($dir.'/*.'.$type);	
  }

  public function buildLinks($dir, $soort)
  {
    $dumpArray	=	array();
    $files = $this->findFiles($dir, $soort);
    foreach ($files as $file)
    {
      $fileInfo	=	pathinfo($file);
      $fileName	=	$fileInfo['basename'];
      if ($soort == "css")
      {
        $dumpArray[] = '<link rel="stylesheet" type="text/css" href="css/' . $fileName . '">';
      }
      else if ($soort == "js")
      {
        $dumpArray[] = '<script src="js/' . $fileName . '"></script>';
      }
    }
    return implode('', $dumpArray);
  }
}
?>