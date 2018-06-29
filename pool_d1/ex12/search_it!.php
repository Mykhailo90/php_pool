#!/usr/bin/php
<?php
  $k = trim($argv[1]);
  $i = 2;
//  echo "$k";
  $reg_exp = "/^".$k.":(\S+)$/";
  while ($i < $argc)
  {
    preg_match($reg_exp, $argv[$i], $res);
    if ($res[0] != "")
      echo "$res[1]"."\n";
    $i++;
  }
?>
