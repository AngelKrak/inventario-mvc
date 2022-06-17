<?php namespace app\Modules;

class Filter 
{
  public function filterXSS($str, $strip_tags = true, $charset = null)
  {
    if (is_array($str)) $str = $this->htmlspecial_array($str, $charset);
    $str = ($strip_tags === true) ? strip_tags($str) : $str;
    $str = str_replace('#\'#','&apos;',$str);    // Change [ ' ] To [ &apos; ]
    $str = str_replace('#\\#','',$str);   // To remove [ / ]
    if (!is_array($str)) $str = htmlspecialchars($str, ENT_QUOTES | ENT_SUBSTITUTE, $charset ?: mb_internal_encoding() ?: 'UTF-8'); // or $str = htmlentities($str);
    return $str;
  }

  public function htmlspecial_array(&$variable, &$charset = null) {
    foreach ($variable as &$value) {
      if (!is_array($value)) { return htmlspecialchars($value, ENT_QUOTES | ENT_SUBSTITUTE, $charset ?: mb_internal_encoding() ?: 'UTF-8');  }
      else { return $this->htmlspecial_array($value); }
    }
  }
}