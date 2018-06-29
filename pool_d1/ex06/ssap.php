#!/usr/bin/php
<?php
  $str = ' ';
  for($i = 1; $i < $argc; $i++)
    $str .= $argv[$i]." ";
  $ar = preg_split('/\s+/', trim($str));
  sort($ar);
  foreach ($ar as $key => $value) {
    if ($value == "")
      exit();
    else {
      echo "$value\n";
    }
  }
?>
