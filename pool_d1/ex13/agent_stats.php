#!/usr/bin/php
<?php
  function average($ar_res){
    $i = 0;
    $answ = 1;
    $counter = 0;
    $len = count($ar_res[2]);
    while ($i < $len){
      if ($ar_res[3][$i] != "moulinette")
      {
        $answ += $ar_res[2][$i];
        $counter++;
      }
      $i++;
   }
   $answ = ($answ / $counter);
   echo "$answ"."\n";
  }

  function search_aver_value($value, $ar_res)
  {
    $i = 0;
    $answ = 1;
    $counter = 0;
    $len = count($ar_res[2]);
    while ($i < $len){
      if ($ar_res[1][$i] == $value && $ar_res[3][$i] != "moulinette")
      {
        $answ += $ar_res[2][$i];
        $counter++;
      }
      $i++;
   }
   $answ = ($answ / $counter);
   echo "$value:$answ"."\n";
  }

  function average_user($ar_res){
    $result = array_unique($ar_res[1]);
    sort($result);
    foreach ($result as $key => $value) {
      search_aver_value($value, $ar_res);
    }
  }

function search_result_value($value, $ar_res)
{
  $i = 0;
  $answ = 1;
  $counter = 0;
  $len = count($ar_res[2]);
  while ($i < $len){
    if ($ar_res[1][$i] == $value && $ar_res[3][$i] != "moulinette")
    {
      $answ += $ar_res[2][$i];
      $counter++;
    }
    if ($ar_res[1][$i] == $value && $ar_res[3][$i] == "moulinette")
      $mul = $ar_res[2][$i];
    $i++;
 }
 $answ = ($answ / $counter);
 $res = $answ - $mul;
  echo "$value:$res"."\n";
}

  function moulinette_variance($ar_res){
    $result = array_unique($ar_res[1]);
    sort($result);
    foreach ($result as $key => $value) {
      search_result_value($value, $ar_res);
    }
  }

  if ($argc == 2)
  {
    $f_content = file_get_contents('php://stdin', true);
    $func_name = trim($argv[1]);
    $reg_exp = '/\b(\S+);(\d+);(\S+);(\d+)\b/';
    preg_match_all($reg_exp, $f_content, $ar_res);
    if ($func_name == "moyenne"){
      $func_name = "average";
      average($ar_res);
    }
    elseif ($func_name == "moyenne_user")
    {
      $func_name = "average_user";
      average_user($ar_res);
    }
    elseif ($func_name == "ecart_moulinette")
    {
      $func_name = "moulinette_variance";
      moulinette_variance($ar_res);
    }
  }
?>
