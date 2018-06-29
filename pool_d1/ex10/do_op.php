#!/usr/bin/php
<?php
if ($argc == "4")
{
		$ar = trim($argv[2]);
    if (strlen($ar) != "1" || !is_numeric(trim($argv[1])) || !is_numeric(trim($argv[3])))
    {
      echo "Incorrect Parameters";
			exit ;
    }
		if ($ar == '+')
			$res = $argv[1] + $argv[3];
		elseif($ar == '-')
			$res = $argv[1] - $argv[3];
		elseif($ar == '*')
			$res = $argv[1] * $argv[3];
		elseif($ar == '/')
			$res = $argv[1] / $argv[3];
		elseif($ar == '%')
			$res = $argv[1] % $argv[3];
		else
		{
			echo "lolkek\n";
			echo "Incorrect Parameters";
			exit ;
		}
		echo "$res\n";
}
else
	echo "Incorrect Parameters";
?>
