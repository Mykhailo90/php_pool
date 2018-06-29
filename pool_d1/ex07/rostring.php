#!/usr/bin/php
<?php
  $ar = preg_split('/\s+/', trim($argv[1]));
  $i = 1;
  while ($i < count($ar)) {
    echo "$ar[$i]"." ";
    $i++;
  }
  echo "$ar[0]"."\n";
?>
