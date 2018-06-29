#!/usr/bin/php
<?php
function cmp($l1, $l2)
{
  $i = 0;
  while (ord($l1[$i]) != 0 && ord($l2[$i]) != 0 && $l1[$i] == $l2[$i])
    $i++;
  $r1 = ord($l1[$i]);
  $r2 = ord($l2[$i]);
  if ($r1 >= ord("A") && $r1 <= ord("Z"))
    $r1 -= 500;
  if ($r1 >= ord("a") && $r1 <= ord("z"))
    $r1 -= 532;
  if ($r1 >= ord("0") && $r1 <= ord("9"))
    $r1 -= 300;

    if ($r2 >= ord("A") && $r2 <= ord("Z"))
      $r2 -= 500;
    if ($r2 >= ord("a") && $r2 <= ord("z"))
      $r2 -= 532;
    if ($r2 >= ord("0") && $r2 <= ord("9"))
      $r2 -= 300;
  return ($r1 - $r2);
}

$str = ' ';
for($i = 1; $i < $argc; $i++)
  $str .= $argv[$i]." ";
$ar = preg_split('/\s+/', trim($str));
usort($ar, "cmp");
foreach ($ar as $key => $val) {
  echo $ar[$key];
  echo "\n";
}
