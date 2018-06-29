#!/usr/bin/php
<?php
  if ($argc != 2)
  {
    echo "Incorrect Parameters\n";
    exit;
  }
  $str = trim($argv[1]);
  $str = preg_replace('/\s+/', '', $str);
  $reg_exp = "/^((\+|-)?(\d+))(\+|\*|\/|-|\%)((\+|-)?(\d+))$/";
  preg_match($reg_exp, $str, $res);
  if ($res[0] == "")
  {
    echo "Syntax Error\n";
    exit;
  }
  if ($res[4] == '+')
    $ans = $res[1] + $res[5];
  elseif($res[4] == '-')
    $ans = $res[1] - $res[5];
  elseif($res[4] == '*')
    $ans = $res[1] * $res[5];
  elseif($res[4] == '/')
    $ans = $res[1] / $res[5];
  elseif($res[4] == '%')
    $ans = $res[1] % $res[5];
  echo "$ans"."\n";
?>
