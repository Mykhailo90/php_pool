#!/usr/bin/php
<?php
  if ($argc == 2)
  {
    setlocale(LC_TIME, "fr_FR");
    date_default_timezone_set('Europe/Paris');

    $days = ["days", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi", "Dimanche"];
    $monthes = ["monthes", "Janvier",	"Fevrier",	"Mars",	"Avril",	"Mai",	"Juin",	"Juillet",
    "Aout",	"Septembre",	"Octobre",	"Novembre",	"Decembre"];

    $reg_exp = '/^(\w+)\s(\d{1,2})\s(\w+)\s(\d{4})\s(\d{2}):(\d{2}):(\d{2})$/';
    preg_match($reg_exp, trim($argv[1]), $ar);
    if ($ar[0] == "")
    {
      echo "Wrong Format\n";
      exit;
    }
    foreach ($days as $key => $value) {
      if (ucfirst($ar[1]) == "$value")
        $d = $key;
    }
    foreach ($monthes as $key => $value) {
      if (ucfirst($ar[3]) == "$value")
        $m = $key;
    }
    if (!isset($m) || !isset($d))
    {
      echo "Wrong Format\n";
      exit;
    }
    $res = mktime($ar[5], $ar[6], $ar[7], $m, $ar[2], $ar[4]);
    echo "$res\n";
  }
?>
