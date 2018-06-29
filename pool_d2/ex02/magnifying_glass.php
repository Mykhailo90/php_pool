#!/usr/bin/php
<?php
  function ft_replace($reg_exp, &$f_content)
  {
    preg_match_all($reg_exp, $f_content, $ar_res);
    $a = 0;
    foreach ($ar_res[1] as $key => $value) {
      $change[$a] = strtoupper($value);
      $a++;
    }
    $a = 0;
    foreach ($ar_res[1] as $key => $value) {
      $r[$a] = $value;
      $a++;
    }
    $a = 0;
    while ($a < count($r))
    {
      $f_content = str_replace($r[$a], $change[$a], $f_content);
      $a++;
    }
  }

  $f_content = file_get_contents('./page.html', true);
  $reg_exp = '/<a.+>([ A-Za-z_0-9]+)/';
  $reg_exp2 = '/title=(".+")/';
  ft_replace($reg_exp, $f_content);
  ft_replace($reg_exp2, $f_content);
  echo "$f_content";
?>
