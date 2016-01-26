<?php
class Percent
{
  public $absolute;
  public $relative;
  public $hunderd;
  public $nominal;
  
  public function __construct($new, $unit)
  {
    $this->absolute = $this->formatNumber($new / $unit);
    $this->relative = $this->formatNumber($this->absolute-1);
    $this->hunderd  = $this->formatNumber($this->relative*100);
    
    if ($this->absolute == 1)
    {
      $this->nominal = 'status-qup';
    }
    else if ($this->absolute > 1)
    {
      $this->nominal = 'positive';
    }
    else
    {
      $this->nominal = 'negative';
    }
  }
  
  public function formatNumber($number)
  {
    return number_format($number, 2);
  }
}

?>