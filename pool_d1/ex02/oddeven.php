#!/usr/bin/php
<?php
echo "Enter a number:";
$stdin = fopen('php://stdin', 'r');
while(!feof($stdin) && $stdin)
{
	$line = fgets($stdin);
	if(!$stdin || feof($stdin))
	{
		echo "\n";
		return(0);
	}
	$line = trim($line, "\n");
	if(is_numeric($line) && $line % 2 == 0)
		echo "The number $line is even\n";
	else if (is_numeric($line) && $line % 2 != 0)
			echo "The number $line is odd\n";
	else
		echo "'$line' is not a number\n";
	$line = NULL;
	echo "Enter a number:";
}
?>
